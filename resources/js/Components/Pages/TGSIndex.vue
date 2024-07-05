<template>
  <div class="main">
    <div class="top">
      <video
        class=""
        autoplay=""
        muted=""
        playsinline=""
        loop=""
        src="https://image.gamebase.com.tw/i.gbc.tw/i.gbc.tw/gb_tw/static/index/0921_TGS_OP_V6_2.mp4"

      ></video>
      <div class="top_nav_title_container">
        <section class="nav_logo_container">
          <div class="top_nav_logo">
            <router-link to='/'>
              <img
                loading="lazy"
                decoding="async"
                width="674"
                height="163"
                src="https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/08/基地XTGS_LOGO_白.png"
                class=""
                alt=""
              />
            </router-link>
          </div>

          <nav class="top_menu">
            <ul id="PC_menu" class="">
              <li>
                <router-link to="/" class="l">首頁</router-link>
              </li>
              <li>
                <!-- <a href="https://news.gamebase.com.tw/TGS2023/?cat=1" class="">東京電玩展快訊</a> -->
                <router-link to="/newslist?page=1" class="location_active"> 東京電玩展快訊 </router-link>
              </li>
              <li>
                <a href="#live" class="">直播活動</a>
              </li>
              <li>
                <a href="https://news.gamebase.com.tw/" class="elementor-item">回基地</a>
              </li>
            </ul>
            <ul id="mobile_menu" class="">
              <li>
                <router-link to="/" class="l">首頁</router-link>
              </li>
              <li>
                <!-- <a href="https://news.gamebase.com.tw/TGS2023/?cat=1" class="">東京電玩展快訊</a> -->
                <router-link to="/newslist?page=1" class="location_active"> TGS快訊 </router-link>
              </li>
              <li>
                <a href="/#live" class="">直播活動</a>
              </li>
            </ul>
          </nav>
        </section>
        <section class="logo_liveLink_container">
          <div class="logo_container">
            <h1>東京電玩展</h1>
            <div class="logo_tokyo_game_show">
              <img
                decoding="async"
                src="https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/TGS-OP-Vertical-V1-LOGO.png"
                title="TGS OP Vertical V1 LOGO"
                alt="TGS OP Vertical V1 LOGO"
                loading="lazy"
              />
            </div>
            <div class="logo_start_TGS">
              <img
                loading="lazy"
                decoding="async"
                width="800"
                height="54"
                src="https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/開始你的ＴＧＳ之旅，從基地出發！-1.png"
                class=""
                alt=""
              />
            </div>
          </div>

          <div class="live_info_container">
            <a href="#live">
              <img
                loading="lazy"
                decoding="async"
                width="800"
                height="412"
                src="https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/9_24專頁-1.png"
                class=""
                alt=""
              />
            </a>
          </div>
        </section>
      </div>
    </div>
    <div class="main_content">
      <div class="news_container_title">
        <h2>2024東京電玩展新聞</h2>
        <div class="news_decorate_line"></div>
      </div>
      <div class="news_content">
        <div class="left_AD">
          <div class="AD_280x230">
            <a href="#">
              <img
                src="https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/300X250.jpg"
                alt=""
              />
            </a>
          </div>
          <div class="AD_280x600">
            <a href="#">
              <img
                src="https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/300x600.jpg"
                alt=""
              />
            </a>
          </div>
        </div>
        <div class="news_container">
          <div class="news_card" v-for="news in newsList">
            <a href="https://news.gamebase.com.tw/TGS2023/?p=2078">
              <img
                loading="lazy"
                decoding="async"
                width="300"
                height="169"
                src="https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/4312617.webp"
                class=""
                alt=""
              />
              <div>
                <h3 class="post_title">
                  {{ news.title }}
                </h3>
                <div>
                  <span class="post_time">{{ news.post_time }}</span>
                </div>
                <span class="see_more_text">閱讀更多 »</span>
              </div>
            </a>
          </div>
          <div class="more_news_btn">
            <router-link to="/NewsList?page=1"> 更多東京電玩展快訊 </router-link>
          </div>
        </div>
        <div class="right_AD">
          <div class="AD_280x230">
            <a href="#">
              <img
                src="https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/女鬼橋2_小版18.jpg"
                alt=""
              />
            </a>
          </div>
          <div class="AD_280x600">
            <a href="#">
              <img
                src="https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/遊戲基地_300x562.jpg"
                alt=""
              />
            </a>
          </div>
        </div>
      </div>
      <div class="live_container" id="live">
        <div class="live_content" id="live1">
          <h2>2024東京電玩展搶先看</h2>
          <div class="news_decorate_line"></div>
          <div class="live_box">
            <iframe
              width="980"
              height="550"
              src="https://www.youtube.com/embed/qWrDto_yC-0?si=0-vXx9emV0b1UrNv"
              title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              referrerpolicy="strict-origin-when-cross-origin"
              allowfullscreen
            ></iframe>
          </div>
        </div>
        <div class="live_content" id="live2">
          <h2>現場LIVE直播</h2>
          <div class="news_decorate_line"></div>
          <div class="live_box">
            <iframe
              width="980"
              height="550"
              src="https://www.youtube.com/embed/qWrDto_yC-0?si=0-vXx9emV0b1UrNv"
              title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              referrerpolicy="strict-origin-when-cross-origin"
              allowfullscreen
            ></iframe>
          </div>
        </div>
      </div>
      <div class="show_girl_container">
        <h2>2024東京電玩展正妹</h2>
        <div class="card_container PC_girl_card_container">
          <div class="girl_card" v-for="(card,index) in showGirlList" @click="openImageZoomSwiper(index)">
            <div class="black_mask"></div>
            <div :style="{ backgroundImage: 'url(' + card.imgUrl + ')' }" @click="openImageZoomSwiper(index)"></div>
          </div>
        </div>
        <div class="card_container mobile_girl_card_container">
          <!-- <div class="girl_card" v-for="(card,index) in showGirlList" @click="openImageZoomSwiper(index)">
            <div class="black_mask"></div>
            <div :style="{ backgroundImage: 'url(' + card.imgUrl + ')' }" @click="openImageZoomSwiper(index)"></div>
          </div> -->
          <MobileShowGirlSipwer
            :showGirlList="showGirlList"
          />
        </div>
      </div>
    </div>
    <ShowGirlSipwer
    :ImgIndex="clickImgIndex"
    :showGirlList="showGirlList"
    :isImgSwiperOpen="isImgSwiperOpen"
    @closeSwiper="closeSwiper"
     />
  </div>
</template>


<script setup>
// import { useMeta } from 'vue-meta';
import { ref } from 'vue';

import ShowGirlSipwer from './ShowGirlSipwer.vue';
import MobileShowGirlSipwer from './MobileShowGirlSipwer.vue';

// useMeta({ title: '首頁' });

let newsList = [];
let showGirlList = [];

newsList = [
  {
    title:
      '《奇幻生活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜,奇幻生活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜',
    post_time: '2023 年 9 月 29 日',
    img: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/4312617.webp',
    link: ''
  },
  {
    title:
      '《奇幻生活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜',
    post_time: '2023 年 9 月 29 日',
    img: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/4312617.webp',
    link: ''
  },
  {
    title:
      '《奇幻生活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜',
    post_time: '2023 年 9 月 29 日',
    img: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/4312617.webp',
    link: ''
  },
  {
    title:
      '《奇幻生活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜',
    post_time: '2023 年 9 月 29 日',
    img: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/4312617.webp',
    link: ''
  },
  {
    title:
      '《奇幻生活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜',
    post_time: '2023 年 9 月 29 日',
    img: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/4312617.webp',
    link: ''
  },
  {
    title:
      '《奇幻生活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜',
    post_time: '2023 年 9 月 29 日',
    img: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/4312617.webp',
    link: ''
  }
];

showGirlList = [
  {
    imgUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
    imgUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
    imgUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
    imgUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
    imgUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
    imgUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
    imgUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
    imgUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
    imgUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
    imgUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
    {
    imgUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
    {
    imgUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
    {
    imgUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
    {
    imgUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
    {
    imgUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },

];

let clickImgIndex = ref(0);
let isImgSwiperOpen = ref(false);

const openImageZoomSwiper = (index)=>{
  console.log(index);
  clickImgIndex.value = index;
  console.log(clickImgIndex);
isImgSwiperOpen.value = !isImgSwiperOpen.value;
};
const closeSwiper = ((val)=>{
  isImgSwiperOpen.value = val;
});
</script>

<style lang="scss" scoped>
//@import '../assets/index.scss';
@import '../../../css/index.scss';
</style>
