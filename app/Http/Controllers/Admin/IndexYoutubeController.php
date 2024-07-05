<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\IndexYouTubeService;
use Inertia\Inertia;
use App\Http\Requests\YTPostRequest;

class IndexYoutubeController extends Controller
{
    public function __construct(){
        $this->ytService = new IndexYouTubeService();
    }
    public function ytList(): \Inertia\Response
    {
        $ytList = $this->ytService->getAllYt();
        return Inertia::render('Admin/indexYT',
            [
                'title'=>'YT列表',
                'data' => $ytList
            ])
            ->withViewData(['title'=>'YT列表']);
    }

    public function ytAdd(YTPostRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->ytService->addNewYt($request->post());
            return response()->json(['status'=>'success']);
        }catch (\Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage()], 500);
        }
    }

    public function ytDel($id): \Illuminate\Http\JsonResponse
    {
        try{
            $this->ytService->delYt($id);
            return response()->json(['status'=>'success']);
        }catch (\Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage()], 500);
        }
    }
}
