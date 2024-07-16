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
      <h1>分類：台灣電競電玩展</h1>
      <div class="news_list">
        <div class="news_card" v-for="news in showNews">
          <a :href="'/newsDetail/'+news.id">
            <img
              loading="lazy"
              decoding="async"
              width="300"
              height="169"
              :src="news.newsPicUrl"
              class=""
              alt=""
            />

            <h3 class="post_title">
              {{ news.newsTitle }}
            </h3>
            <div>
              <span class="post_time">{{ moment(news.created_at).format('YYYY-MM-DD HH:mm:ss') }}</span>
            </div>
            <p class="see_more">閱讀更多 »</p>
          </a>
        </div>
      </div>
      <div class="news_pagination">
        <div class="page_btn" v-for=" pages in data.totalPage">
            <a :class="{isNowPage: data.nowPage === pages }" :href="'/newsList/'+ pages "> {{ pages }}</a>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import moment from "moment";

const props = defineProps([
    'data',
])
let showNews = props.data.newsList

</script>

<style lang="scss" scoped>
@import '../../../css/newsList.scss';
</style>
