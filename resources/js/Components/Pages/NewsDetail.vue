<template>
  <div class="main">
    <div class="top">
      <div class="top_video_background">
        <video
          class=""
          autoplay=""
          muted=""
          playsinline=""
          loop=""
          :src="data.indexSet ? data.indexSet.url : ''"
        ></video>
      </div>
      <div class="top_nav_title_container">
        <section class="nav_logo_container">
          <div class="top_nav_logo">
            <router-link to="/">
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
      </div>
    </div>
    <div class="news_container">
      <div class="news_content">
        <div class="news_detail">
          <h1>{{newsDetail.newsTitle}}</h1>
          <div class="blue-line"></div>
          <div class="article_info">
            <span><font-awesome-icon :icon="['fas', 'user-tie']" /></span>
            <span>admin</span>
            <span><font-awesome-icon :icon="['fas', 'clock']" /></span>
            <span>{{moment(newsDetail.created_at).format('YYYY-MM-DD HH:mm:ss')}}</span>
          </div>
          <div class="article_content">
            <div v-html="newsDetail.newsContent"></div>
          </div>
        </div>
        <div class="new_detail_AD_hot_article">
          <div class="AD_280x230">
            <a :href="props.data.advDatas ? 'http://'+props.data.advDatas.IU[0].advLink : '#'">
              <img
                  :src="props.data.advDatas ?  props.data.advDatas.IU[0].advImgUrl : '#'"
                alt=""
              />
            </a>
          </div>
          <div class="AD_280x600">
              <a :href="props.data.advDatas ? 'http://'+props.data.advDatas.PD[0].advLink : '#'">
              <img
                  :src="props.data.advDatas ?  props.data.advDatas.PD[0].advImgUrl : '#'"
                alt=""
              />
            </a>
          </div>
          <p>熱門文章</p>
          <div class="hot_artilce">
            <a href="">
              <div class="img_container">
                <img src="https://image.gamebase.com.tw/gb_img/7/004/308/4308457.jpg" alt="">
              </div>
              <div class="hot_article_info">
                <p class="title">
                  《破曉傳奇》DLC 後傳劇情《黎明新程》解析！2 週年特別直播東京電玩展登場
                </p>
                <p class="post_time">2023 年 9 月 15 日</p>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="mobile_hot_news">
        <div class="mobile_hot_news_AD">
          <img src="https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/遊戲基地_320x250-1.jpg" alt="" width="320" height="250">
        </div>
        <p>熱門文章</p>
        <div class="hot_artilce">
          <a href="">
            <div class="img_container">
              <img src="https://image.gamebase.com.tw/gb_img/7/004/308/4308457.jpg" alt="">
            </div>
            <div class="hot_article_info">
              <p class="title">
                《破曉傳奇》DLC 後傳劇情《黎明新程》解析！2 週年特別直播東京電玩展登場
              </p>
              <p class="post_time">2023 年 9 月 15 日</p>
            </div>
          </a>
        </div>
      </div>
      <div class="more_news">
        <h2>更多東京電玩展快訊</h2>
        <div class="more_card_container">
          <div class="news_card" v-for="newsCard in moreNewsList">
            <a href="">
                <div class="img_container">
                  <img src="https://image.gamebase.com.tw/gb_img/7/004/308/4308457.jpg" alt="">
                </div>
                <div class="hot_article_info">
                  <p class="title">
                    {{newsCard.title}}
                  </p>
                  <p class="post_time">2023 年 9 月 15 日</p>
                </div>
            </a>
          </div>
        </div>
      </div>
      <div class="more_TGS_news_btn">
        <router-link to='/newsList?page=1'>
          更多東京電玩展快訊
        </router-link>
      </div>
      <div class="mobile_bottom_AD">
        <img src="https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/320x100.jpg" alt="" width="320" height="100">
      </div>
    </div>
  </div>
</template>

<script>
// import { useMeta } from 'vue-meta';


export default {
  setup () {
    // useMeta({ title: 'Single Page' });
  }
};
</script>

<script setup>
// import { useMeta } from 'vue-meta';
// import { ref ,watch } from 'vue';
import moment from "moment";

// useMeta({ title: '東京電玩展快訊' });
const props = defineProps([
    'data'
])
console.log(props.data);

let newsDetail = props.data.news;

const moreNewsList = [
  {
    newsNo: '001',
    title: '《破曉傳奇》DLC 後傳劇情《黎明新程》解析！2 週年特別直播東京電玩展登場,《破曉傳奇》DLC 後傳劇情《黎明新程》解析！2 週年特別直播東京電玩展登場',
    time: '2023 年 9 月 15 日',
  },
  {
    newsNo: '002',
    title: '《破曉傳奇》DLC 後傳劇情《黎明新程》解析！2 週年特別直播東京電玩展登場',
    time: '2023 年 9 月 15 日',
  },
  {
    newsNo: '002',
    title: '《破曉傳奇》DLC 後傳劇情《黎明新程》解析！2 週年特別直播東京電玩展登場',
    time: '2023 年 9 月 15 日',
  },
  {
    newsNo: '004',
    title: '《破曉傳奇》DLC 後傳劇情《黎明新程》解析！2 週年特別直播東京電玩展登場',
    time: '2023 年 9 月 15 日',
  },
]


</script>

<style lang="scss" scoped>
@import '../../../css/newsList.scss';
@import '../../../css/newsDetail.scss';
// /assets/newsDetailscss.scss
</style>
