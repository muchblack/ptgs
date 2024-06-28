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
                                <input type="text" class="form-control" id="advTitle" placeholder="廣告標題" v-model="advTitle" />
                                <label for="basic-default-fullname">廣告標題</label>
                            </div>
                            <div class="mb-3">
                                <label for="defaultSelect" class="form-label">廣告位置</label>
                                <select id="defaultSelect" class="form-select" v-model="advPosition">
                                    <option v-for="item in news_status_list" :value="item.value">{{ item.name }}</option>
                                </select>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="advLink" placeholder="廣告鏈接" v-model="advLink" />
                                <label for="basic-default-fullname">廣告鏈接</label>
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
    props:[
        'title',
        'data'
    ],
    data() {
        return {
            newsTitle :'',
            newsStatus:'temp',
            news_status_list:[
                {
                    name:'草稿',
                    value:'temp'
                },
                {
                    name:'已發佈',
                    value:'publish'
                },
                {
                    name:'已刪除',
                    value:'del'
                }
            ]
        }
    },
    methods: {
        submit_news(){

        }
    }
}
</script>

<style>
</style>
