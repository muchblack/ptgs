<template>
    <div>
        <div class="row gy-4">
            <div class="divider">
                <div class="divider-text"><h6>{{ title }}</h6></div>
            </div>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >新增圖片</button>
            </div>
            <div class="row mb-5" v-if="data.length > 0 ">
                <div class="col-md-6 col-lg-4 mb-4" v-for="item in data">
                    <div class="card">
                        <div class="card-body">
                            <img class="img-fluid d-flex mx-auto my-4 rounded" :src="item.picURL">
                            <button type="button" class="btn btn-danger" @click="picDel(item.id)">刪除圖片</button>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                目前沒有圖片
            </div>

        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">新增圖片</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating form-floating-outline mb-4">
                            <input class="form-control" type="file" id="advImgUrl" @change="uploadPic">
                            <input type="hidden" v-model="picUrl">
                            <label for="advImg" class="form-label">照片牆</label>
                        </div>
                        <div class="col-md-6 col-lg-4 mg-4">
                            <img class="img-fluid d-flex mx-auto my-4 rounded" :src="picUrl" alt="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉視窗</button>
                        <button type="button" class="btn btn-primary" @click="savePic">存檔</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>


const props = defineProps([
    'title',
    'data'
])

const picUrl = defineModel();

async function savePic(){
    const formData = new FormData();
    formData.append('picURL', picUrl.value)
    await axios.post(
        '/Gamerscon2024/admin/picWall/',
        formData
    ).then( response => {
        window.location.reload()
    })
}
async function uploadPic(e){
    const objImg = e.target.files.item(0);
    const formData = new FormData();
    formData.append('file', objImg);
    await axios.post('/Gamerscon2024/admin/picWall/picUpload',formData, {
        headers:{
            'Content-Type': 'multipart/form-data'
        }
    }).then( response => {
        picUrl.value = response.data.imgPath;
    });
}

async function picDel(pid)
{
    await axios.post('/Gamerscon2024/admin/picWall/del/'+pid
    ).then( response => {
        window.location.reload()
    });
}
</script>
