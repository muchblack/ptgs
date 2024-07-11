<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexSetUploadRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Users;
use App\Services\IndexSetService;
use App\Traits\uploadImg;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use uploadImg;

    public function __construct()
    {
        $this->userModel = new Users();
        $this->indexSet = new IndexSetService();
    }
    public function adminLogin(): \Inertia\Response
    {
        return Inertia::render('Admin/login')->withViewData(['title' => '登入']);
    }

    public function actLogin(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request->post('email'), 'password' => $request->post('password')])){
            return response()->json(['message'=> 'success']);
        }
        else
        {
            return response()->json(['errors' => ['accountError'=>'帳號或密碼錯誤']], 404);
        }
    }

    public function indexSet(): \Inertia\Response
    {
        return Inertia::render('Admin/indexSet',['title'=>'相關設定列表'])->withViewData(['title' => '相關設定列表']);
    }

    public function indexSetEdit($position): \Inertia\Response
    {
        $data = $this->indexSet->getIndexSet($position);
        return Inertia::render('Admin/indexSetEdit',['position' => $position, 'data' => $data ])->withViewData(['title' => '相關設定']);
    }

    public function actIndexSet(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->post();
        $params = [
            'url' => ($data['uploadUrl'] == 'undefined' ? $data['urlLink'] : $data['uploadUrl']),
            'position' => $data['position'],
        ] ;

        try{
            $this->indexSet->modify($params);
            return response()->json(['msg'=> 'success']);
        }catch (\Exception $e){
            return response()->json(['msg'=> $e->getMessage()], 400);
        }
    }

    public function indexSetUpload(IndexSetUploadRequest $request): \Illuminate\Http\JsonResponse
    {
        $path = $this->uploadImg($request->file('upload'), 'indexSet');
        return response()->json(['uploadPath'=> $path]);
    }
}
