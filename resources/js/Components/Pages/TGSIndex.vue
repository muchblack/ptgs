<template>
  <div class="main">
    <div class="top">
        <video
            class=""
            autoplay=""
            muted=""
            playsinline=""
            loop=""
            :src="data.indexSet.url"
            v-if="data.indexSet.mimeType =='mp4'"
        ></video>
        <img class="top_BG" v-else :src="data.indexSet.url" alt="" />
      <div class="top_nav_title_container">
        <section class="nav_logo_container">
          <nav class="top_menu">
            <ul id="PC_menu" class="">
              <li>
                  <a href="/">首頁</a>
              </li>
              <li>
                  <a href="/newsList/1">電競電玩展快訊</a>
              </li>
              <li>
                <a href="#picWall" class="">活動照片</a>
              </li>
              <li>
                <a href="https://news.gamebase.com.tw/" class="elementor-item">回基地</a>
              </li>
            </ul>
            <ul id="mobile_menu" class="">
              <li>
                  <a href="/">首頁</a>
              </li>
              <li>
                  <a href="/newsList/1">電競電玩展快訊</a>
              </li>
              <li>
                  <a href="#picWall" class="">活動照片</a>
              </li>
            </ul>
          </nav>
        </section>
      </div>
    </div>
    <div class="main_content">
      <div class="news_container_title">
        <h2>Gamers Con 2024 電競電玩展新聞</h2>
        <div class="news_decorate_line"></div>
      </div>
      <div class="news_content">
        <div class="left_AD">
          <div class="AD_280x230">
            <a :href="props.data.advDatas.LU.length ? 'http://'+props.data.advDatas.LU[0].advLink : '#'">
              <img
                :src="props.data.advDatas.LU.length ?  props.data.advDatas.LU[0].advImgUrl : '#'"
                alt=""
              />
            </a>
          </div>
          <div class="AD_280x600">
            <a :href="props.data.advDatas.LD.length ? 'http://'+props.data.advDatas.LD[0].advLink : '#'">
              <img
                :src="props.data.advDatas.LD.length ? props.data.advDatas.LD[0].advImgUrl : '#'"
                alt=""
              />
            </a>
          </div>
        </div>
        <div class="news_container">
          <div class="news_card" v-for="news in newsList">
            <a :href="'/newsDetail/'+ news.id">
              <img
                loading="lazy"
                decoding="async"
                width="300"
                height="169"
                :src="news.newsPicUrl"
                class=""
                alt=""
              />
              <div>
                <h3 class="post_title">
                  {{ news.newsTitle }}
                </h3>
                <div>
                  <span class="post_time">{{ moment(news.created_at).format('YYYY-MM-DD HH:mm:ss') }}</span>
                </div>
                <span class="see_more_text">閱讀更多 »</span>
              </div>
            </a>
          </div>
          <div class="more_news_btn">
            <a href="/newsList/1">更多Gamers Con 2024快訊</a>
          </div>
        </div>
        <div class="right_AD">
          <div class="AD_280x230">
            <a :href="props.data.advDatas.RU.length ? 'http://'+props.data.advDatas.RU[0].advLink : '#'">
              <img
                :src="props.data.advDatas.RU.length ? props.data.advDatas.RU[0].advImgUrl : '#'"
                alt=""
              />
            </a>
          </div>
          <div class="AD_280x600">
            <a :href="props.data.advDatas.RD.length ? 'http://'+props.data.advDatas.RD[0].advLink : '#' ">
              <img
                :src="props.data.advDatas.RD.length ? props.data.advDatas.RD[0].advImgUrl : '#'"
                alt=""
              />
            </a>
          </div>
        </div>
      </div>
      <div class="live_container">
        <div class="live_content" v-for="yt in props.data.indexYT">
          <h2>{{ yt.title }}</h2>
          <div class="news_decorate_line"></div>
          <div class="live_box" v-html="yt.ytLink"></div>
        </div>
      </div>
      <div class="show_girl_container" id="picWall">
        <h2>Gamers Con 2024 花絮</h2>
          <div class="news_decorate_line"></div>
        <div class="card_container PC_girl_card_container">
          <div class="girl_card" v-for="(card,index) in showGirlList" @click="openImageZoomSwiper(index)">
            <div class="black_mask"></div>
            <div :style="{ backgroundImage: 'url(' + card.picURL + ')' }" @click="openImageZoomSwiper(index)"></div>
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
import moment from "moment";


import ShowGirlSipwer from './ShowGirlSipwer.vue';
import MobileShowGirlSipwer from './MobileShowGirlSipwer.vue';

// useMeta({ title: '首頁' });
const props = defineProps([
    'data'
])

console.log(props.data)
console.log(props.data.indexSet)
let showGirlList = [];
let newsList = [] ;

let tempNewsList = [
  {
    newsTitle:
      '《奇幻生活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜,奇幻生活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜',
    created_at: '2023 年 9 月 29 日',
      newsPicUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/4312617.webp',
    link: ''
  },
  {
    newsTitle:
      '《奇幻生活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜',
    created_at: '2023 年 9 月 29 日',
      newsPicUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/4312617.webp',
    link: ''
  },
  {
      newsTitle:
      '《奇幻生活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜',
      created_at: '2023 年 9 月 29 日',
      newsPicUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/4312617.webp',
    link: ''
  },
  {
      newsTitle:
      '《奇幻生活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜',
      created_at: '2023 年 9 月 29 日',
      newsPicUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/4312617.webp',
    link: ''
  },
  {
      newsTitle:
      '《奇幻生活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜',
      created_at: '2023 年 9 月 29 日',
      newsPicUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/4312617.webp',
    link: ''
  },
  {
      newsTitle:
      '《奇幻生活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜',
      created_at: '2023 年 9 月 29 日',
      newsPicUrl: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/4312617.webp',
    link: ''
  }
];

let tempShowGirlList = [
  {
      picURL: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
      picURL: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
      picURL: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
      picURL: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
      picURL: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
      picURL: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
      picURL: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
      picURL: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
      picURL: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
  {
      picURL: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
    {
        picURL: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
    {
        picURL: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
    {
        picURL: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
    {
        picURL: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },
    {
        picURL: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/2023TGS_SG00.jpg'
  },

];

if(props.data.news.length !== 'undefined')
{
    newsList = props.data.news;
}else
{
    newsList = tempNewsList;
}

if(props.data.picWall.length !== 'undefined')
{
    showGirlList = props.data.picWall;
}else
{
    showGirlList = tempShowGirlList;
}

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
@import "../../../css/index.scss";
</style>
