<?php

use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\IndexController as AdminController;
use \App\Http\Controllers\admin\NewsController as AdminNewsController;
use App\Http\Controllers\IndexController as HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix'=>"admin", 'as'=>'admin.'],static function(){
    Route::get("/", AdminController::class)
        ->name('index');
    Route::resource('category', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

Route::group(['prefix'=>""],static function(){
    Route::get('/', [HomeController::class, "index"])
        ->name('home');

    Route::get('/info', [InfoController::class,"index"])
        ->name('info');

    Route::get('/news/{id}', [NewsController::class, "index"])
        ->name('news');

    Route::get('/news/show/{id}', [NewsController::class, "show"])
        ->where('id','\d+')
        ->name('news.show');
});

