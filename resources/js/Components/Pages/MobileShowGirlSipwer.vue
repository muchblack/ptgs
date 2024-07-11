<template >
  <div class="mobile_swiper_main">
    <swiper
      :modules="modules"
      :navigation="true"
      :slides-per-view="1"
      :pagination="true"
      @swiper="onSwiper"
      @slideChange="onSlideChange"
      class="mobile_swiper_mySwiper"
      id="mobile_swiper_mySwiper"
    >
      <swiper-slide v-for="img in props.showGirlList">
        <div class="mobile_swiper_img_container">
          <img :src="img.imgUrl" alt="" />
        </div>
      </swiper-slide>
    </swiper>
  </div>
</template>

<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Navigation, Pagination, Scrollbar, A11y } from 'swiper/modules';
import { watch } from 'vue';



import 'swiper/css';
import 'swiper/css/navigation';
// import 'swiper/css/pagination';

const emit = defineEmits(["closeSwiper"]);

const props = defineProps({
  showGirlList: {
    type: Object,
    required: true
  },
  // ImgIndex:{
  //   type: Number,
  //   required: true,
  // }
});

// let clickImgIndex = ref(props.clickImgIndex);
// watch(() => props.ImgIndex,(newIndex) =>{
// clickToSlideTo(newIndex);
// });

let myMobileSwiper = '';

const onSwiper = (swiper) => {
  myMobileSwiper = swiper;
};
const onSlideChange = () => {
  console.log('slide change');
};

const modules = [Navigation, Pagination, Scrollbar, A11y];

// let clickToCloseZoom = (()=>{
//   emit("closeSwiper",false);
// });

// const clickToSlideTo = (index)=>{
// setTimeout(() => {
//   mySwiper.slideTo(index,0,false);
// },0);


// };

</script>

<style lagn="scss">
.mobile_swiper_main {
  position: relative;
  left: 0;
  top: 0;
  width: 100dvw;
  height: 446px;
  z-index: 999;
  padding: 70px;
  cursor: pointer;
}
.swiper {
  max-width: 90dvw;
  margin: 0 auto;
  height: 120%;
}
.swiper-slide {
  height: 100%;
  text-align: center;
}
.mobile_swiper_img_container{
  height: 100%;
}
.mobile_swiper_img_container img{
  height: 100%;
}

.swiper-pagination{
  position: absolute;
  color: #fff;
  top: 0;
  letter-spacing: 0px;
}

@media screen and (max-width: 480px){
  .mobile_swiper_main{
    padding: 20px;
  }
  .mobile_swiper_img_container img{
    width: 100%;
    height: auto;
    max-width: 300px !important;
  }

}
</style>
