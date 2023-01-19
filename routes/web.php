<?php

use App\Http\Controllers\admin\IndexController as AdminController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomeController;
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
Route::group(['prefix'=>"admin"],static function(){
    Route::get("/", AdminController::class)
        ->name('admin.index');
});

Route::group(['prefix'=>""],static function(){
    Route::get('/', [NewsController::class, "index"]);

    Route::get('/info', [InfoController::class,"index"]);

    Route::get('/news/{id}', [NewsController::class, "index"])
        ->name('news');

    Route::get('/news/show/{id}', [NewsController::class, "show"])
        ->where('id','\d+')
        ->name('news.show');
});

