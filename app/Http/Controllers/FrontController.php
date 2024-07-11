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
            'indexSet' => $indexSet
        ];
        return Inertia::render('TGSIndex', ['data' => $data])->withViewData(['title'=> '首頁']);
    }

    public function newsList(): \Inertia\Response
    {
        $news = $this->newsService->getNewsList();
        $indexSet = $this->indexSetService->getIndexSet('inside');
        return Inertia::render('NewsList', []);
    }

    public function newsDetail($id): \Inertia\Response
    {
        $advDatas = $this->advService->getAdvertiseByPosition('inside');
        $indexSet = $this->indexSetService->getIndexSet('inside');
        $news = $this->newsService->getNews($id);
        $data = [
            'advDatas' => $advDatas,
            'indexSet' => $indexSet,
            'news' => $news,
        ];
        return Inertia::render('NewsDetail', ['data'=>$data])->withViewData(['title' => '新聞內頁']);
    }
}
