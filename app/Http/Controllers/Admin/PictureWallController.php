<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PictureWallController extends Controller
{
    public function picList(){
        return Inertia::render('Admin/advList', ['title'=>'廣告列表']);
    }

    public function actPicAdd(){

    }

    public function picDel($id){

    }
}
