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
                            <h5 class="card-title">首頁上方橫幅</h5>
                            <a href="/admin/indexSet/edit/index">修改橫幅內容</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">列表&內頁上方橫幅</h5>
                            <a href="/admin/indexSet/edit/inside">修改橫幅內容</a>
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
