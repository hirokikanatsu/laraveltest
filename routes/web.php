<?php

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

use App\Http\Controllers\MenuController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Auth::routes();


Route::group(['middleware' => 'guest'],function(){
    Route::get('/', [MenuController::class,'home'])->name('home');

    Route::get('/login_form',[AuthController::class,'login_form'])->name('login_form');
    
    Route::post('/login', [AuthController::class,'login'])->name('login');
    
    Route::get('/signup_form',[AuthController::class,'signup_form'])->name('signup_form');

    Route::post('/signup',[AuthController::class,'signup'])->name('signup');

});


Route::group(['middleware' => 'auth'],function(){
    Route::get('/index',[MenuController::class,'index'])->name('index');

    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

    Route::get('/mypage',[MenuController::class,'mypage'])->name('mypage');


    //献立新規作成
    Route::get('/createmenu',[MenuController::class,'createmenu'])->name('createmenu');

    Route::post('/createend',[MenuController::class,'createend'])->name('createend');

    //献立詳細
    Route::get('/detailmenu/{menu}',[MenuController::class,'detailmenu'])->name('detailmenu');

    Route::post('/detailmenu',[MenuController::class,'detailmenuAjax'])->name('detailmenuAjax');

    //献立編集
    Route::get('/editmymenu/{menu}',[MenuController::class,'editmymenu'])->name('editmymenu');

    Route::post('/editend/{menu}',[MenuController::class,'editend'])->name('editend');

    //献立削除
    Route::get('/deleteend/{menu}',[MenuController::class,'deleteend'])->name('deleteend');

    //いいねした献立一覧
    Route::get('/myiine',[MenuController::class,'myiine'])->name('myiine');

    Route::get('allpage',[MenuController::class,'allpage'])->name('allpage');

    //検索にヒットした献立表示
    Route::post('/search',[MenuController::class,'search'])->name('search');
});
