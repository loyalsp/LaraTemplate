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

Route::get('/', function () {
    Auth::logout();
    return view('index');
});

Route::post('/user/login',[
    'uses' => 'UserController@post_user_login',
    'as' => 'post-user-login']);

Auth::routes();

