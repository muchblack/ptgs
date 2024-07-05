<template >
  <div class="swiper_main" @click="clickToCloseZoom()" v-if="openImgSwiper">
    {{ openImgSwiper }}
   
  </div>
</template>

<script setup>

import {ref} from 'vue';


import 'swiper/css';
import 'swiper/css/navigation';

const openImgSwiper = ref(true);
let clickToCloseZoom = (()=>{
  // console.log(openImgSwiper);
  openImgSwiper.value = !openImgSwiper.value;
  // console.log(openImgSwiper.value);
  console.log('openImgSwiper:', openImgSwiper.value);
});

// const clickToTarget = (()=>{

// });
</script>

<style lagn="scss">
.swiper_main {
  position: fixed;
  left: 0;
  top: 0;
  width: 100dvw;
  height: 100dvh;
  background-color: rgba(0, 0, 0, 0.8);
  z-index: 999;
  padding: 70px;
}
.swiper {
  max-width: 90dvw;
  margin: 0 auto;
  height: 100%;
}
.swiper-slide {
  height: 100%;
  text-align: center;
}
.zoom_img_container{
  height: 100%;
}
.zoom_img_container img{
  height: 100%;
}

.swiper-pagination{
  position: absolute;
  color: #fff;
  top: 0;
  letter-spacing: 0px;
}
</style>
