<template>
<div>
    <div class="row gy-4">
        <div class="divider">
            <div class="divider-text"><h6>{{ title }}</h6></div>
        </div>
        <div>
           <button class="btn btn-primary" @click="addNews">新聞發佈</button>
<!--            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >test</button>-->
        </div>
        <div class="col-12">
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>新聞標題</th>
                            <th>發佈時間</th>
                            <th>狀態</th>
                            <th>動作</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr v-if="data.length > 0 " v-for="item in data">
                                <td> {{ item.id }}</td>
                                <td> {{ item.newsTitle }}</td>
                                <td> {{ item.created_at }}</td>
                                <td> {{ item.newsStatus }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" :href="'/Gamerscon2024/admin/news/edit/'+item.id"><i class="mdi mdi-pencil me-1"></i> 編輯</a>
                                            <button class="dropdown-item" @click="clkDel(item.id)"><i class="mdi mdi-book me-1"></i>刪除</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr v-else>
                                <td colspan="5" class="text-center">現在沒有新聞</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>


<script>
export default{
    props:[
        'title',
        'data'
    ],
    data() {
        return {

        }
    },
    methods: {
        addNews() {
            location.href='/Gamerscon2024/admin/news/add'
        },
        async clkDel(id){
            let formData = new FormData();
            formData.append('newsID', id);

            await axios.post('/Gamerscon2024/admin/news/delete',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(
                (response) => {
                    location.reload();
                }
            )
        }
    }
}
</script>
