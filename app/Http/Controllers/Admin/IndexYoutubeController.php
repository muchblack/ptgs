<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class IndexYoutubeController extends Controller
{
    public function ytList(){
        return Inertia::render('Admin/advList', ['title'=>'廣告列表']);
    }

    public function ytAdd(){
        return Inertia::render('Admin/advEdit', ['title'=>'編輯廣告']);
    }

    public function ytEdit($id){
        return Inertia::render('Admin/advEdit', ['title'=>'編輯廣告', 'id'=> $id, 'data'=>[]]);
    }

    public function ytDel($id){

    }
}
