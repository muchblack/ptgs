<template>
    <div>
        <div class="row gy-4">
            <div class="divider">
                <div class="divider-text"><h6>{{ title }}</h6></div>
            </div>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >新影片</button>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>影片標題</th>
                                <th>影片網址</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <tr v-if="data.length > 0 " v-for="item in data">
                                <td> {{ item.id }}</td>
                                <td> {{ item.title }}</td>
                                <td> {{ item.ytLink }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" @click="delYt(item.id)"><i class="mdi mdi-book me-1"></i>刪除</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr v-else>
                                <td colspan="5" class="text-center">現在沒有影片</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">新增影片</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="title" placeholder="影片標題" v-model="ytTitle"/>
                                <label for="basic-default-fullname">影片標題</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <textarea style="height:200px" v-model="ytLink" class="form-control" id="ytLink"></textarea>
                                <label for="basic-default-fullname">影片嵌入碼</label>
                                <samll class="text-danger">請修改嵌入碼內的 width爲980 height爲550才能爲最佳呈現</samll>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="addNewYt">新增</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps(
    [
        'title',
        'data'
    ])

let ytTitle = '';
let ytLink = '';

async function addNewYt() {
    const formItem = ['title', 'ytLink'];
    let formData = new FormData();
    formData.append('title', ytTitle);
    formData.append('ytLink', ytLink);
    await axios.post(
        '/Gamerscon2024/admin/yt/add',
        formData
    ).then( response => {
        window.location.reload();
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

async function delYt(ytId){
    await axios.post(
        '/Gamerscon2024/admin/yt/del/'+ytId,
    ).then( response => {
        window.location.reload();
    });
}

</script>
