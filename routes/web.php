<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});



Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    Route::resource('member', 'MemberController@show');
    Route::resource('article', 'ArticleController');
});
//管理員登入

Route::group(['middleware' => 'auth'], function() { //會員登入
    Route::post('comment', 'CommentController@store');
});

Route::resource('photo', 'PhotoController');//跑七項功能

Route::get('article/{id}', 'ArticleController@show');
//{id} 指代任意字符串，在我們的規劃中，此字段為文章 ID，為數字

Route::resource('map', 'MapController@show');

Route::get('article/{id}/edit', 'ArticleController@edit');
Route::patch('article/{id}', 'ArticleController@update');

Auth::routes();

Route::post('/admin/member', 'MemberController@save');

Route::get('/', 'HomeController@index');