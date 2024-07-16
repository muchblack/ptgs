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
              :src="data.indexSet.url"
              v-if="data.indexSet.mimeType =='mp4'"
          ></video>
          <img class="top_BG" v-else :src="data.indexSet.url" alt="" />
      </div>
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
                  <a href="/#picWall" class="">活動照片</a>
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
                    <a href="/#picWall" class="">活動照片</a>
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
            <a :href="props.data.advDatas.length ? 'http://'+props.data.advDatas.IU[0].advLink : '#'">
              <img
                  :src="props.data.advDatas.length ?  props.data.advDatas.IU[0].advImgUrl : '#'"
                alt=""
              />
            </a>
          </div>
          <div class="AD_280x600">
              <a :href="props.data.advDatas.length ? 'http://'+props.data.advDatas.PD[0].advLink : '#'">
              <img
                  :src="props.data.advDatas.length ?  props.data.advDatas.PD[0].advImgUrl : '#'"
                alt=""
              />
            </a>
          </div>
          <p>熱門文章</p>
          <div class="hot_artilce">
            <a href="">
              <div class="img_container">
                <img :src="data.hotNews.newsPicUrl" alt="">
              </div>
              <div class="hot_article_info">
                <p class="title">
                  {{ data.hotNews.newsTitle}}
                </p>
                <p class="post_time">{{moment(data.hotNews.created_at).format('YYYY-MM-DD HH:mm:ss')}}</p>
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
        <h2>更多Gamers Con 2024快訊</h2>
        <div class="more_card_container">
          <div class="news_card" v-for="newsCard in moreNewsList">
            <a href="">
                <div class="img_container">
                  <img :src="newsCard.newsPicUrl" alt="">
                </div>
                <div class="hot_article_info">
                  <p class="title">
                    {{newsCard.newsTitle}}
                  </p>
                  <p class="post_time">{{moment(newsDetail.created_at).format('YYYY-MM-DD HH:mm:ss')}}</p>
                </div>
            </a>
          </div>
        </div>
      </div>
      <div class="more_TGS_news_btn">
            <a href="/newsList/1">更多Gamers Con 2024快訊</a>
      </div>
      <div class="mobile_bottom_AD">
        <img src="https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/320x100.jpg" alt="" width="320" height="100">
      </div>
    </div>
  </div>
</template>

<script setup>
import moment from "moment";

const props = defineProps([
    'data'
])
console.log(props.data);

let newsDetail = props.data.news;
let moreNewsList = props.data.moreNews;
</script>

<style lang="scss" scoped>
@import '../../../css/newsList.scss';
@import '../../../css/newsDetail.scss';
</style>
