<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AdminController extends Controller{

    public function adminLogin()
    {
        return Inertia::render('Admin/login',['title'=>'登入']);
    }
}
