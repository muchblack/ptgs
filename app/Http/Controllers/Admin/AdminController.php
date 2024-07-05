<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
class AdminController extends Controller
{

    public function __construct()
    {
        $this->userModel = new Users();
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
}
