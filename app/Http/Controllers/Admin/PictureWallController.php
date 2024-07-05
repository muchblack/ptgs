<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PictureWallService;
use App\Traits\uploadImg;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PictureWallController extends Controller
{
    use uploadImg;
    public function __construct(){
        $this->picWall = new PictureWallService();
    }
    public function picList(): \Inertia\Response
    {
        $pics = $this->picWall->getAllPics();
        return Inertia::render('Admin/picsList',
            [
                'title'=>'照片牆',
                'data' => $pics
            ])->withViewData(['title'=>'照片牆']);
    }

    public function actPicAdd(Request $request): \Illuminate\Http\JsonResponse
    {
        $params = $request->post();
        try{
            $this->picWall->addNewPic($params);
            return response()->json(['msg'=> 'success']);
        }catch (\Exception $e){
            return response()->json(['msg'=> $e->getMessage()], 400);
        }
    }

    public function picDel($id): \Illuminate\Http\JsonResponse
    {
        try{
            $this->picWall->delPic($id);
            return response()->json(['status'=>'success']);
        }catch (\Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage()], 500);
        }
    }

    public function uploadPic(Request $request): \Illuminate\Http\JsonResponse
    {
        $path = $this->uploadImg($request->file('file'), 'picWall');
        return response()->json(['imgPath'=> $path]);
    }
}
