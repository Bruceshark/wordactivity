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
//网站首页
Route::get('/', '\App\Http\Controllers\PostController@welcome');
//登陆页面
Route::get('/login', '\App\Http\Controllers\LoginController@index')->name('login');
//登陆行为
Route::post('/login', '\App\Http\Controllers\LoginController@login');
//登出行为
Route::get('/logout', '\App\Http\Controllers\LoginController@logout');
//注册页面
Route::get('/register', '\App\Http\Controllers\RegisterController@index');
//注册行为
Route::post('/register', '\App\Http\Controllers\RegisterController@register');

Route::group(['middleware' => 'auth:web'], function() {
    //所有文章概览
    Route::get('/posts', '\App\Http\Controllers\PostController@index');
    //创建新文章
    Route::get('/posts/create', '\App\Http\Controllers\PostController@create');
    Route::post('/posts', '\App\Http\Controllers\PostController@store');
    //详情页
    Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');
    // 图片上传
    Route::post('/posts/image/upload', '\App\Http\Controllers\PostController@imageUpload');
    // 编辑文章
    Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
    Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');
    // 删除文章
    Route::get('/posts/{post}/delete', '\App\Http\Controllers\PostController@delete');
    // 提交评论
    Route::post('/posts/{post}/comment', '\App\Http\Controllers\PostController@comment');

    // 赞
    Route::get('/posts/{comment}/like', '\App\Http\Controllers\PostController@like');
    // 取消赞
    Route::get('/posts/{comment}/unlike', '\App\Http\Controllers\PostController@unlike');
    
    // 个人中心
    Route::get('/user/{user}', '\App\Http\Controllers\UserController@show');


});




