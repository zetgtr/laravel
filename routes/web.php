<?php

use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\forms\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\admin\forms\UnloadingController as AdminUnloadingController;
use App\Http\Controllers\admin\FormsController;
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

    Route::get("/form", FormsController::class)
        ->name('form.index');

    Route::group(['prefix'=> "form", 'as' =>'form.'],static function(){

        Route::resource('feedback', AdminFeedbackController::class);

        Route::resource('unloading', AdminUnloadingController::class);

    });

    Route::resource('category', AdminCategoryController::class);

    Route::resource('news', AdminNewsController::class);

});

Route::group(['prefix'=>""],static function(){
    Route::get('/', [HomeController::class, "index"])
        ->name('home');

    Route::get('/info', [InfoController::class,"index" ])
        ->name('info');

    Route::post('/info/store', [InfoController::class,"store"])
        ->name('info.store');

    Route::get('/news/{id}', [NewsController::class, "index"])
        ->name('news');

    Route::post('/news/store', [NewsController::class, "store"])
        ->name('news.store');

    Route::get('/news/show/{id}', [NewsController::class, "show"])
        ->where('id','\d+')
        ->name('news.show');
});

