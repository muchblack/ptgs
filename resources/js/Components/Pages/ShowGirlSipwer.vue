<template >
  <div class="swiper_main" v-if="isImgSwiperOpen">

    <swiper
      :modules="modules"
      :navigation="true"
      :slides-per-view="1"
      :pagination="{
      type: 'fraction',
      }"
      @swiper="onSwiper"
      @slideChange="onSlideChange"
      class="mySwiper"
      id="mySwiper"
      @click="clickToCloseZoom()"
    >
      <swiper-slide v-for="img in props.showGirlList">
        <div class="zoom_img_container" @click="clickToCloseZoom()">
          <img :src="img.picURL" alt="" />
        </div>
      </swiper-slide>
      <!-- <swiper-slide>Slide 2</swiper-slide>
      <swiper-slide>Slide 3</swiper-slide> -->
    </swiper>
  </div>
</template>

<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Navigation, Pagination, Scrollbar, A11y } from 'swiper/modules';
import { watch } from 'vue';

import 'swiper/css';
import 'swiper/css/navigation';

const emit = defineEmits(["closeSwiper"]);

const props = defineProps({
  showGirlList: {
    type: Object,
    required: true
  },
  isImgSwiperOpen:{
    type: Boolean,
    required: true,
  },
  ImgIndex:{
    type: Number,
    required: true,
  }
});

// let clickImgIndex = ref(props.clickImgIndex);
watch(() => props.ImgIndex,(newIndex) =>{
clickToSlideTo(newIndex);
});

let mySwiper = '';

const onSwiper = (swiper) => {
  mySwiper = swiper;
};
const onSlideChange = () => {
  console.log('slide change');
};

const modules = [Navigation, Pagination, Scrollbar, A11y];

let clickToCloseZoom = (()=>{
  emit("closeSwiper",false);
});

const clickToSlideTo = (index)=>{
setTimeout(() => {
  mySwiper.slideTo(index,0,false);
},0);


};

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
  cursor: pointer;
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
