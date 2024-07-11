<template>
    <div>
        <div class="row gy-4">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ title }}</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-floating form-floating-outline mb-4">
                                <input class="form-control" type="file" id="url" @change="upload">
                                <label for="url" class="form-label">上傳橫幅內容</label>
                                <small id="msg" class="text-danger" v-show="isError">{{ errMsg }}</small><br>
                                <small class="text-danger">上傳檔案僅限jpeg,jpg,png,mp4檔案</small>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="urlLink" placeholder="新聞標題" v-model="urlLink" />
                                <label for="urlLink">或是現有橫幅鏈接</label>
                            </div>
                        </form>

                        <button type="button" class="btn btn-primary" @click="submit_indexSet">送出</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

let objUrl = defineModel('objUrl')
let urlLink = defineModel('urlLink')
let isError = defineModel('isError',{default: false})
let errMsg = defineModel('errMsg')

const props = defineProps([
    'title',
    'data',
    'position'
])

if(props.data)
{
    urlLink.value = props.data.url;
}

async function submit_indexSet(){
    console.log(props.position)
    const formData = new FormData();
    formData.append('uploadUrl', objUrl.value);
    formData.append('urlLink', urlLink.value);
    formData.append('position', props.position);

    await axios.post(
        '/admin/indexSet/edit',
        formData
    ).then( response => {
        window.location.href='/admin/indexSet'
    });
}

async function upload(e){
    const objUpload = e.target.files.item(0);
    const formData = new FormData();
    formData.append('upload', objUpload);
    await axios.post('/admin/indexSet/upload',formData, {
        headers:{
            'Content-Type': 'multipart/form-data'
        }
    }).then( response => {
        urlLink.value = response.data.uploadPath;
    }).catch( error => {
        let msg = error.response.data.errors;
        console.log('upload' in msg)
        if('upload' in msg){
            isError.value = true;
            errMsg.value = '上傳格式不對';
        }
        else {
            isError.value = false;
        }
    });
}
</script>

<style>
</style>
