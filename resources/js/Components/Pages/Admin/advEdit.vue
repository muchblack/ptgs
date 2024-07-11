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
                                <input type="text" class="form-control" id="advTitle" placeholder="廣告標題" v-model="form.advTitle" @change="form.validate('advTitle')"/>
                                <label for="basic-default-fullname">廣告標題</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input class="form-control" type="file" id="advImgUrl" @change="uploadPic">
                                <input type="hidden" v-model="form.advImgUrl" @change="form.validate('advImgUrl')">
                                <label for="advImg" class="form-label">廣告圖片</label>
                            </div>
                            <div class="col-md-6 col-lg-4 mg-4">
                                <img class="img-fluid d-flex mx-auto my-4 rounded" :src="form.advImgUrl" alt="">
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="advLink" placeholder="廣告鏈接" v-model="form.advLink" @change="form.validate('advLink')"/>
                                <label for="basic-default-fullname">廣告鏈接</label>
                            </div>
                        </form>

                        <button type="button" class="btn btn-primary" @click="submit_adv">送出</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from 'laravel-precognition-vue';

const props = defineProps([
    'title',
    'data',
    'position'
])

let form = useForm('post', '/admin/adv/edit', {
    advTitle: '',
    advImgUrl: '',
    advLink: '',
})

if(props.data)
{
    form.advTitle = props.data.advTitle;
    form.advImgUrl = props.data.advImgUrl;
    form.advLink = props.data.advLink;
}

const submit = () => form.submit()

async function submit_adv(){
    const formItem = ['advTitle', 'advImgUrl', 'advLink'];
    const formData = new FormData();
    formData.append('advTitle', form.advTitle);
    formData.append('advImgUrl', form.advImgUrl);
    formData.append('advPosition', props.position);
    formData.append('advLink', form.advLink);

    await axios.post(
        '/admin/adv/edit',
        formData
    ).then( response => {
        window.location.href='/admin/adv'
    }).catch( error => {
        let msgs = error.response.data.errors;
         formItem.forEach(function(item){
            if(item in msgs){
                document.getElementById(item).classList.add('is-invalid')
            }
            else {
                document.getElementById(item).classList.remove('is-invalid')
            }
        })
    });
}

async function uploadPic(e){
    const objImg = e.target.files.item(0);
    const formData = new FormData();
    formData.append('file', objImg);
    formData.append('position', props.position);
    await axios.post('/admin/adv/picUpload',formData, {
        headers:{
            'Content-Type': 'multipart/form-data'
        }
    }).then( response => {
        // console.log(response.data.imgPath)
        form.advImgUrl = response.data.imgPath;
    });
}
</script>

<style>
</style>
