<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
$api=app(\Dingo\Api\Routing\Router::class);
$api->version('v1', ['namespace' => '\App\Http\Controllers\Api'],function ($api) {
//    $api->get('version', function () {
//        return 'v1';
//    });
    //获取文章数据
    $api->get('articles','ArticleController@articles');
    //获取栏目数据
    $api->get('categories', 'CategoryController@categories');
    //获取轮播图数据
    $api->get('carousels', 'CarouselController@carousels');
    //登录请求
    $api->post('login', 'AuthController@login');
    //我的
    $api->get('me', 'AuthController@me');
    //退出请求
    $api->get('logout', 'AuthController@logout');
//限制请求数
//$api->version('v1', function ($api) {
//    $api->group(['middleware' => 'api.throttle', 'limit' => 2, 'expires' => 1],
//        function ($api) {
//            $api->get('articles', 'App\Http\Controllers\Api\ArticleController@articles');
//        }); });




});








