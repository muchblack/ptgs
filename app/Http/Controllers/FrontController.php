<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\AdvertisesService;
use App\Services\IndexSetService;
use App\Services\IndexYouTubeService;
use App\Services\NewsService;
use App\Services\PictureWallService;
use Inertia\Inertia;

class FrontController extends Controller
{

    public function __construct(){
        $this->advService = new AdvertisesService();
        $this->newsService = new NewsService();
        $this->picWallService = new PictureWallService();
        $this->indexYTService = new IndexYouTubeService();
        $this->indexSetService = new IndexSetService();
    }

    public function index(): \Inertia\Response
    {
        $advDatas = $this->advService->getAdvertiseByPosition('index');
        $news = $this->newsService->getIndexNews();
        $picWall = $this->picWallService->getAllPics();
        $indexYT = $this->indexYTService->getAllYt();
        $indexSet = $this->indexSetService->getIndexSet('index');

        $data = [
            'advDatas' => $advDatas,
            'news' => $news,
            'picWall' => $picWall,
            'indexYT' => $indexYT,
            'indexSet' => $indexSet,
            'test' => asset('resources/asset/img/white.jpg')
        ];
        return Inertia::render('TGSIndex', ['data' => $data])->withViewData(['title'=> '首頁']);
    }

    public function newsList($page = 1): \Inertia\Response
    {
        $allNews = $this->newsService->getNewsList();
        $indexSet = $this->indexSetService->getIndexSet('inside');
        $newsList = $allNews['data'][$page-1] ?? [];
        //pages
        $totalPage = (int)number_format(ceil($allNews['total']/18));
        $data = [
            'newsList' => $newsList,
            'indexSet' => $indexSet,
            'totalPage' => $totalPage,
            'nowPage' => (int) $page
        ];
        return Inertia::render('NewsList', ['data' => $data])->withViewData(['title'=>'電競電玩展快訊']);
    }

    public function newsDetail($id): \Inertia\Response
    {
        $advDatas = $this->advService->getAdvertiseByPosition('inside');
        $indexSet = $this->indexSetService->getIndexSet('inside');
        $news = $this->newsService->getNews($id);
        $moreNews = $this->newsService->getIndexNews();
        $hotNews = $this->newsService->getHotNews();
        $data = [
            'advDatas' => $advDatas,
            'indexSet' => $indexSet,
            'news' => $news,
            'moreNews' => $moreNews,
            'hotNews' => $hotNews,
        ];
        return Inertia::render('NewsDetail', ['data'=>$data])->withViewData(['title' => '新聞內頁']);
    }
}
