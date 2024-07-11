<script setup>
import Editor from '@tinymce/tinymce-vue'
const props = defineProps(['title','data', 'csrf'])
</script>
<template>
<div>
    <div class="row gy-4">
        <input type="hidden" id="_csrf" :value="csrf" >
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ title }}</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="newsTitle" placeholder="新聞標題" v-model="newsTitle" />
                            <label for="basic-default-fullname">新聞標題</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input class="form-control" type="file" id="advImgUrl" @change="uploadPic">
                            <input type="hidden" v-model="newsPicUrl">
                            <label for="advImg" class="form-label">新聞縮圖</label>
                            <div class="col-md-6 col-lg-4 mg-4">
                                <img class="img-fluid d-flex mx-auto my-4 rounded" :src="newsPicUrl" alt="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="defaultSelect" class="form-label">新聞狀態</label>
                            <select id="defaultSelect" class="form-select" v-model="newsStatus">
                                <option v-for="item in news_status_list" :value="item.value">{{ item.name }}</option>
                            </select>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <Editor
                                api-key="1ckt3i26fufx7lcuv9nt5gv4cuyagfu2t59bkxjjgt75eksu"
                                :init="{
                                    language_url: '/langs/zh_TW.js',
                                    language:'zh_TW',
                                    plugins: 'powerpaste searchreplace autolink directionality visualblocks visualchars image link media mediaembed codesample table charmap pagebreak nonbreaking anchor tableofcontents insertdatetime advlist lists checklist wordcount tinymcespellchecker editimage help permanentpen charmap linkchecker emoticons advtable export autosave advcode fullscreen',
                                    images_upload_handler: handleImageUpload,
                                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image media | alignleft aligncenter alignright alignjustify | code'
                                }"
                                v-model="newsContent"
                            />
                        </div>
                        <button type="button" class="btn btn-primary" @click="submit_news">送出</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default{
    data() {
        return {
            newsTitle : this.data.newsTitle,
            newsStatus: this.data.newsStatus ?? 'temp',
            newsContent: this.data.newsContent ?? '',
            newsPicUrl: '',
            news_status_list:[
                {
                    name:'草稿',
                    value:'temp'
                },
                {
                    name:'已發佈',
                    value:'pub'
                },
                {
                    name:'已刪除',
                    value:'del'
                }
            ]
        }
    },
    methods: {
        async submit_news(){
            let formData = new FormData();
            formData.append('newsTitle', this.newsTitle);
            formData.append('newsStatus', this.newsStatus);
            formData.append('newsContent', this.newsContent);
            formData.append('newsPicUrl', this.newsPicUrl);
            formData.append('newsID', this.data.id ?? 0);
            await axios.post('/admin/news/add',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(
                (response) => {
                    location.href='/admin/news'
                }
            )
        },
        async uploadPic(e){
            const objImg = e.target.files.item(0);
            const formData = new FormData();
            formData.append('file', objImg);
            await axios.post('/admin/news/picUpload',formData, {
                headers:{
                    'Content-Type': 'multipart/form-data'
                }
            }).then( response => {
                // console.log(response.data.imgPath)
                this.newsPicUrl = response.data.location;
            });
        }
    }
}
const handleImageUpload =  (blobInfo, progress) => new Promise((resolve, reject) => {
    const csrf = document.getElementById('_csrf').value;
    const xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', '/admin/news/picUpload');
    xhr.setRequestHeader('X-CSRF-TOKEN', csrf);

    xhr.upload.onprogress = (e) => {
        progress(e.loaded / e.total * 100);
    };

    xhr.onload = () => {
        if (xhr.status === 403) {
            reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
            return;
        }

        if (xhr.status < 200 || xhr.status >= 300) {
            reject('HTTP Error: ' + xhr.status);
            return;
        }

        const json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
            reject('Invalid JSON: ' + xhr.responseText);
            return;
        }

        resolve(json.location);
    };

    xhr.onerror = () => {
        reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
    };

    const formData = new FormData();
    formData.append('file', blobInfo.blob(), blobInfo.filename());

    xhr.send(formData);
});
</script>

<style>
.ck-editor__editable {
    min-height: 300px;
}
</style>
