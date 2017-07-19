<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
            
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('profile','UserController@profile');

//多文件上传
Route::get('seephotos','FileController@photos');
Route::get('photo/insert','FileController@insertphotos');
Route::post('insertphotos','FileController@doinsertphotos');
Route::get('file','FileController@file');
Route::post('file','FileController@dofile');
Route::get('seefile','FileController@seefile');

//ajax+文件
Route::get('/file/ajax','FileController@ajax');
Route::post('/file/doajax','FileController@doajax');

// 无限极分类
Route::controller('/cate','cateController');

// smtp邮箱验证
Route::get('/email','EmailController@email');
// Route::get('/jihuo','FileController@jihuo');

// 写文章
Route::controller('articles','ArticlesController');

// Route::controller('shop','shopController');
Route::get('/shop/list','shopController@Insert');
Route::get('/shop/a/{id}','shopController@doinsert');
Route::get('/shop/del','shopController@del');
Route::get('/buy','shopController@buy');
Route::get('/shop/edit','shopController@edit');
