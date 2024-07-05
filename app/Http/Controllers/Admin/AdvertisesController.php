<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvPostRequest;
use App\Services\AdvertisesService;
use App\Traits\uploadImg;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\AdvResource;

class AdvertisesController extends Controller
{
    use uploadImg;

    private $pos=[
        'LU'=>'首頁廣告 - 左上',
        'LD'=>'首頁廣告 - 左下',
        'RU'=>'首頁廣告 - 右上',
        'RD'=>'首頁廣告 - 右下',
    ];
    public function __construct()
    {
        $this->advService = new AdvertisesService();
    }

    public function advList(): \Inertia\Response
    {
        $advList = $this->advService->getAllAdvertises();
        return Inertia::render('Admin/advList',
            [
                'title'=>'廣告列表',
                'data' => $advList,
            ])
            ->withViewData(['title'=>'廣告列表']);
    }

    public function advEdit($position): \Inertia\Response
    {
        $advShow = $this->pos[$position];
        $data = $this->advService->getAdvertise($position);
        return Inertia::render('Admin/advEdit',
            [
                'title'=>'編輯 '.$advShow,
                'position'=> $position,
                'data'=>$data
            ])
            ->withViewData(['title'=>'編輯廣告']);
    }

    public function modify(AdvPostRequest $request): \Illuminate\Http\JsonResponse
    {
        $params = $request->post();
        try{
            $this->advService->modifyAdv($params);

            return response()->json(['msg'=> 'success']);
        }catch (\Exception $e){
            return response()->json(['msg'=> $e->getMessage()], 400);
        }
    }

    public function uploadPic(Request $request): \Illuminate\Http\JsonResponse
    {
        $path = $this->uploadImg($request->file('file'), 'advImg');
        return response()->json(['imgPath'=> $path]);
    }
}
