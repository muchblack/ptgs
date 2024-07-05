<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdvertisesController;
use App\Http\Controllers\Admin\IndexYoutubeController;
use App\Http\Controllers\Admin\PictureWallController;
use App\Http\Controllers\Admin\NewsController;
use \App\Http\Middleware\CheckUserLogin;
use App\Http\Controllers\FrontController;

use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use App\Http\Requests\AdvPostRequest;


Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/newsList',[FrontController::class, 'newsList'])->name('newsList');
Route::get('/newsDetail/{id}',[FrontController::class, 'newsDetail'])->name('newsDetail');


//後台
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('login');
Route::post('/admin/login', [AdminController::class, 'actLogin']);
Route::get('/admin/logout', function(){
    Auth::logout();
    return redirect('/admin/login');
});
Route::prefix('admin')->middleware([CheckUserLogin::class])->group(function() {
    //新聞
    Route::get('/news', [NewsController::class, 'newsList'])->name('news.list');
    Route::get('/news/add', [NewsController::class, 'newsAdd']);
    Route::post('/news/add',[NewsController::class, 'actNewsAdd']);
    Route::get('/news/edit/{id}', [NewsController::class, 'newsEdit']);
    Route::post('/news/delete', [NewsController::class, 'newsDelete']);
    Route::post('/news/picUpload', [NewsController::class, 'picUpload']);

    //廣告
    Route::get('/adv', [AdvertisesController::class, 'advList']);
    Route::get('/adv/edit/{position}', [AdvertisesController::class, 'advEdit']);

    Route::post('/adv/edit', function(AdvPostRequest $request) {
        $adv = new AdvertisesController();
        $adv->modify($request);
    })
    ->middleware([HandlePrecognitiveRequests::class]);

    Route::post('/adv/picUpload', [AdvertisesController::class, 'uploadPic']);

    //首頁影片
    Route::get('/yt/', [IndexYoutubeController::class, 'ytList']);
    Route::post('/yt/add',[IndexYoutubeController::class, 'ytAdd']);
    Route::post('/yt/del/{id}',[IndexYoutubeController::class, 'ytDel']);

    //照片列表
    Route::get('/picWall/', [PictureWallController::class, 'picList']);
    Route::post('/picWall/picUpload', [PictureWallController::class, 'uploadPic']);
    Route::post('/picWall', [PictureWallController::class, 'actPicAdd']);
    Route::post('/picWall/del/{id}',[PictureWallController::class, 'picDel']);
});
