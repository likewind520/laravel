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
Route::get('/','HomeController@index')->name('home');
//用户管理
//登录
Route::get('/login','UserController@login')->name('login');
//注册
Route::get('/register','UserController@register')->name('register');
//提交注册
Route::post('/register','UserController@store')->name('register');

//发送验证码
Route::any('/code/send','Util\CodeController@send')->name('code.send');