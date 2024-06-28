<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AdvertisesController extends Controller
{
    public function advList(){
        return Inertia::render('Admin/advList', ['title'=>'廣告列表']);
    }

    public function advAdd(){
        return Inertia::render('Admin/advEdit', ['title'=>'編輯廣告']);
    }

    public function advEdit($id){
        return Inertia::render('Admin/advEdit', ['title'=>'編輯廣告', 'id'=> $id, 'data'=>[]]);
    }

    public function advDelete($id){

    }
}
