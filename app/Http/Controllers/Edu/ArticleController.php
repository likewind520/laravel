<?php

namespace App\Http\Controllers\Edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    public function index(){
        //加载模板
        return view('edu.article.index');
    }
    //创建
    public function create(){
        //加载模板
        return view('edu.article.create');
    }
    //保存
    public function store (Request $request){

        dd($request->all());

    }
}
