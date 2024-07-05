<template>
    <div>
        <div class="row gy-4">
            <div class="divider">
                <div class="divider-text"><h6>{{ title }}</h6></div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">首頁廣告 - 左上</h5>
                            <img class="img-fluid d-flex mx-auto my-4 rounded" :src="data.LU ? data.LU[0].advImgUrl : '#'" :alt="data.LU ? data.LU[0].advTitle : ''">
                            <p class="card-text">連結到：{{ data.LU ? data.LU[0].advLink : '尚未新增廣告'}}</p>
                            <a href="/admin/adv/edit/LU">修改廣告內容</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">首頁廣告 - 左下</h5>
                            <img class="img-fluid d-flex mx-auto my-4 rounded" :src="data.LD ? data.LD[0].advImgUrl : '#'" :alt="data.LD ? data.LD[0].advTitle : ''">
                            <p class="card-text">連結到：{{ data.LD ? data.LD[0].advLink : '尚未新增廣告'}}</p>
                            <a href="/admin/adv/edit/LD">修改廣告內容</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">首頁廣告 - 右上</h5>
                            <img class="img-fluid d-flex mx-auto my-4 rounded" :src="data.RU ? data.RU[0].advImgUrl : '#'" :alt="data.RU ? data.RU[0].advTitle : ''">
                            <p class="card-text">連結到：{{ data.RU ? data.RU[0].advLink : '尚未新增廣告'}}</p>
                            <a href="/admin/adv/edit/RU">修改廣告內容</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">首頁廣告 - 右下</h5>
                            <img class="img-fluid d-flex mx-auto my-4 rounded" :src="data.RD ? data.RD[0].advImgUrl : '#'" :alt="data.RD ? data.RD[0].advTitle : ''">
                            <p class="card-text">連結到：{{  data.RD ? data.RD[0].advLink : '尚未新增廣告'}}</p>
                            <a href="/admin/adv/edit/RD">修改廣告內容</a>
                        </div>
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
</script>
