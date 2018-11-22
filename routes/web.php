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
Route::get('/','Home\HomeController@index')->name('home');
//第二种方式可以app/Http/Middleware/RedirectlfAuthenticated.php
//Route::get('/home','Home\HomeController@index')->name('home');
//前台
Route::group(['prefix'=>'home','namespace'=>'Home', 'as'=>'home.'],function(){
    Route::get('/','HomeController@index')->name('index');
    Route::resource('article','ArticleController');

});
//用户管理
//登录页面
Route::get('/login','UserController@login')->name('login');
//注册后的登录
Route::post('/login','UserController@loginForm')->name('login');
//注册
Route::get('/register','UserController@register')->name('register');
//提交注册
Route::post('/register','UserController@store')->name('register');
//重置密码
Route::get('/passwordReset','UserController@password_reset')->name('passwordReset');
//重置密码提交
Route::post('/passwordReset','UserController@password_resetForm')->name('passwordReset');
//注销登录
Route::get('/logout','UserController@logout')->name('logout');

//会员中心
Route::group(['prefix'=>'member','namespace'=>'Member','as'=>'member.'],function(){
    //用户管理
    Route::resource('user','UserController');
    //关注呗关注
    Route::get('attention/{user}','UserController@attention')->name('attention');
    //我的粉丝
    Route::get('get_fans/{user}','UserController@myFans')->name('my_fans');
    //我的关注
    Route::get('get_following/{user}','UserController@myFollowing')->name('my_following');
});


//工具类
Route::group(['prefix'=>'util','namespace'=>'Util','as'=>'util.'],function(){
    //发送验证码
    Route::any('/code/send','CodeController@send')->name('code.send');
    //头像上传
    Route::any('/upload','UploadController@upload')->name('upload');
    Route::any('/filesLists','UploadController@filesLists')->name('filesLists');

});


//后台路由,中间价，
//middleware'=>['admin.auth']拦截
Route::group(['middleware'=>['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function (){

    Route::get('index','IndexController@index')->name('index');
    //文章的增删改查
    Route::resource('category','CategoryController');
});


