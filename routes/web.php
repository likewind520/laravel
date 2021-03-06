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
    //文章管理
    Route::resource('article','ArticleController');
    //评论区
    Route::resource('comment','CommentController');
    //点赞 和取消点赞
    Route::get('zan/make','ZanController@make')->name('zan.make');
    //收藏 和取消收藏
    Route::get('collect/make','CollectController@make')->name('collect.make');
    //搜素
    Route::get('search','HomeController@search')->name('search');

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
    //我的点赞
    Route::get('get_zan/{user}','UserController@myZan')->name('my_zan');
    //我的所有通知
    Route::get('notify/{user}','NotifyController@index')->name('notify');
    //标记已读
    Route::get('notify/show/{notify}','NotifyController@show')->name('notify.show');
    //我的收藏
    Route::get('get_collect/{user}','UserController@myCollect')->name('my_collect');

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
    //配置项管理
    Route::get('config/edit/{name}','ConfigController@edit')->name('config.edit');
    Route::post('config/update/{name}','ConfigController@update')->name('config.update');
    //轮播图管理
    Route::resource('carousels','CarouselController');
});

//微信管理
Route::group(['prefix'=>'wechat','namespace'=>'Wechat','as'=>'wechat.'],function (){
    //菜单管理
    Route::resource('button','ButtonController');
    //推送
    Route::get('button/push/{button}','ButtonController@push')->name('button.push');
    //微信通信地址
    Route::any('api/handler','ApiController@handler')->name('api.handler');
    //文本回复
    Route::resource('response_text','ResponseTextController');
    //图文回复
    Route::resource('response_news','ResponseNewsController');
    //基本回复  关注回复以及默认回复
    Route::resource('response_base','ResponseBaseController');

});
//权限管理
Route::group(['prefix'=>'role','namespace'=>'Role','as'=>'role.'],function() {
    Route::get('permission/index','PermissionController@index')->name('permission.index');
    Route::get('permission/forget_permission_cache','PermissionController@forgetPermissionCache')->name('permission.forget_permission_cache');
    //角色管理的资源路由
    Route::resource('role','RoleController');
    //设置角色权限
    Route::post('role/set_role_permission/{role}','RoleController@setRolePermission')->name('role.set_role_permission');
    //用户管理
    Route::get('user/index','UserController@index')->name('user.index');
    Route::get('user/user_set_role_create/{user}','UserController@userSetRoleCreate')->name('user.user_set_role_create');
    Route::post('user/user_set_role_store/{user}','UserController@userSetRoleStore')->name('user.user_set_role_store');


});


