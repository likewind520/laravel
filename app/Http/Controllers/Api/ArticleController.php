<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Transformers\ArticleTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends CommonController
{
        public function articles(){
            //文章的所有数据
            //return Article::all();
            //文章的所有数据以及外键用户和栏目id,返回单个数据
            //return $this->response->array(Article::find(1));
            //分页
//            return $this->response->paginator(Article::paginate(2,5));
            //return response()->json(['error' => 'Unauthorized'], 401);
            //出现404页面  做的一个404页面
            //return $this->response->error('This is an error.', 404);
//            $limit = \request()->query('limit',10);
//            return $limit;
            //返回所有文章数据,并且每个文章数据中包含一个栏目 通过with压入栏目数据 get()获得
//            return $this->response->array(Article::with('category')->get());


            //dingo中的Transformers
//            return $this->response->collection(Article::all(),new ArticleTransformer());
            return $this->response->collection(Article::all(),new ArticleTransformer());
        }
}
