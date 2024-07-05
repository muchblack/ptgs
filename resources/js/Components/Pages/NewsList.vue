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
          src="https://image.gamebase.com.tw/i.gbc.tw/i.gbc.tw/gb_tw/static/index/1920x1080_loop_bg.mp4"
        ></video>
      </div>
      <div class="top_nav_title_container">
        <section class="nav_logo_container">
          <div class="top_nav_logo">
<!--            <router-link to="/">-->
              <img
                loading="lazy"
                decoding="async"
                width="674"
                height="163"
                src="https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/08/基地XTGS_LOGO_白.png"
                class=""
                alt=""
              />
<!--            </router-link>-->
          </div>

          <nav class="top_menu">
            <ul id="PC_menu" class="">
              <li>
<!--                <router-link to="/" class="l">首頁</router-link>-->
              </li>
              <li>
                <!-- <a href="https://news.gamebase.com.tw/TGS2023/?cat=1" class="">東京電玩展快訊</a> -->
<!--                <router-link to="/newslist?page=1" class="location_active"> 東京電玩展快訊 </router-link>-->
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
<!--                <router-link to="/" class="l">首頁</router-link>-->
              </li>
              <li>
                <!-- <a href="https://news.gamebase.com.tw/TGS2023/?cat=1" class="">東京電玩展快訊</a> -->
<!--                <router-link to="/newslist?page=1" class="location_active"> TGS快訊 </router-link>-->
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
      <h1>分類：東京電玩展</h1>
      <div class="news_list">
        <div class="news_card" v-for="news in showNews">
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

            <h3 class="post_title">
              {{ news.title }}
            </h3>
            <div>
              <span class="post_time">{{ news.post_time }}</span>
            </div>
            <p class="see_more">閱讀更多 »</p>
          </a>
        </div>
      </div>
      <div class="news_pagination">
        <div class="page_btn" v-for="(pagination,index) in newsList">
<!--          <router-link :class="{isNowPage: pageNow - 1 === index }" :to="'/newslist?page=' + pagination.page">-->
<!--            {{ // pagination.page }}-->
<!--          </router-link>-->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import { useMeta } from 'vue-meta';

// export default {
//   setup () {
//     useMeta({ title: 'Single Page' });
//   }
// };
</script>

<script setup>
// import { useMeta } from 'vue-meta';
// import { useRoute } from 'vue-router';
import { ref ,watch } from 'vue';

useMeta({ title: '東京電玩展快訊' });

const route = useRoute();
console.log(route);
console.log(route.query);

let newsList = [];
let pageNow = ref(1);
let showNews = ref(null);


pageNow = route.query.page;

console.log(pageNow);

watch(() => route.query.page,(newPageNow) =>{
console.log(newPageNow);
pageNow = route.query.page;
showNews.value = newsList[newPageNow - 1].news;
console.log(showNews);
});


newsList = [{
  page: 1,
  news: [
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
  ],
},
{
  page: 2,
  news: [
    {
      title:
        '《奇活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜',
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
        '《幻活 i：轉圈圈的龍和偷取時間的少女》展出小遊戲體驗，更暗藏《奇幻生活 LINK！》彩蛋驚喜',
      post_time: '2023 年 9 月 29 日',
      img: 'https://news.gamebase.com.tw/TGS2023/wp-content/uploads/2023/09/4312617.webp',
      link: ''
    },
  ],
}];
showNews.value = newsList[pageNow - 1].news;
// console.log(showNews);
</script>

<style lang="scss" scoped>
//@import '../assets/newsList.scss';
@import '../../../css/newsList.scss';
</style>
