<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdvertisesController;
use App\Http\Controllers\Admin\IndexYoutubeController;
use App\Http\Controllers\Admin\PictureWallController;
use App\Http\Controllers\Admin\NewsController;

Route::prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'adminLogin'])->name('admin.index');

    //新聞
    Route::get('/news', [NewsController::class, 'newsList'])->name('news.list');
    Route::get('/news/add', [NewsController::class, 'newsAdd']);
    Route::post('/news/add',[NewsController::class, 'actNewsAdd']);
    Route::get('/news/edit/{id}', [NewsController::class, 'newsEdit']);
    Route::post('/news/delete', [NewsController::class, 'newsDelete']);
    Route::post('/news/picUpload', [NewsController::class, 'picUpload']);

    //廣告
    Route::get('/adv', [AdvertisesController::class, 'advList']);

    //首頁影片
    Route::get('/yt/', [IndexYoutubeController::class, 'ytList']);

    //照片列表
    Route::get('/picwall/', [IndexYoutubeController::class, 'picList']);
});
