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
    return view('welcome');
});
//Route::get('/edu/article/index','Edu\ArticleController@index')->name('edu.article.index');
//Route::get('/edu/article/create','Edu\ArticleController@create')->name('edu.article.create');
//Route::post('/edu/article/store','Edu\ArticleController@store')->name('edu.article.store');
Route::resource('/edu/photo','Edu\PhotoController');

//artisan make:controller Edu/IndexController --resource 一次性生成七个方法
//artisan route:list 查看清单