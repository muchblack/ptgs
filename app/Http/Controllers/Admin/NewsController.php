<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\NewsService;

class NewsController extends Controller
{
    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }
    public function newsList(): \Inertia\Response
    {
        $news = $this->newsService->getAllNews();
        return Inertia::render('Admin/newsLists', ['title' => '新聞列表', 'data'=> $news])->withViewData(['title' => '新聞列表']);
    }

    public function newsAdd(): \Inertia\Response
    {
        return Inertia::render('Admin/newsEditor',['title'=>'新增新聞', 'data'=>[], 'csrf' => csrf_token()])->withViewData(['title'=>'新增新聞']);
    }

    public function newsEdit($id): \Inertia\Response
    {
        $news = $this->newsService->getNews($id);
        return Inertia::render('Admin/newsEditor', ['title'=>'編輯新聞', 'data'=>$news, 'csrf' => csrf_token()])->withViewData(['title'=>'編輯新聞']);
    }

    public function newsDelete(Request $request): string
    {
        $newsID =$request->input('newsID');
        $this->newsService->deleteNews($newsID);

        return 'success';
    }

    public function actNewsAdd(Request $request): string
    {
        $data = $request->post();
        return $this->newsService->modifyNews($data);
    }

    public function picUpload(Request $request){
        $path = $this->newsService->uploadImg($request->file('file'));
        return response()->json(['location' => $path]);
    }
}
