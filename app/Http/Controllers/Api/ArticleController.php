<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Transformers\ArticleTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends CommonController
{
        public function articles(){
            //默认是每页分10篇文章
            $limit = \request()->query('limit',10);
            $cid = request()->query('cid');
            if ($cid){
                //获得的是同一栏目的文章
                $articles = Article::latest()->where('category_id',$cid)->paginate($limit);
            }else{
                $articles = Article::latest()->paginate($limit);
            }
            //new ArticleTransformer() 实例化 把想要的数据在里面先处理好.
            return $this->response->paginator($articles,new ArticleTransformer());
            //如果做了分页就不能用collection
//            return $this->response->collection(Article::all(),new ArticleTransformer());

            //文章的所有数据
            //return Article::all();
            //文章的所有数据以及外键用户和栏目id,返回单个数据
            //return $this->response->array(Article::find(1));
            //分页
            //return $this->response->paginator(Article::paginate(2,5));
            //return response()->json(['error' => 'Unauthorized'], 401);
            //出现404页面  做的一个404页面
            //return $this->response->error('This is an error.', 404);
            //返回所有文章数据,并且每个文章数据中包含一个栏目 通过with压入栏目数据 get()获得
            //return $this->response->array(Article::with('category')->get());

            //dingo中的Transformers
            //return $this->response->collection(Article::all(),new ArticleTransformer());
            //如果做了分页就不能用collection
            //return $this->response->collection(Article::all(),new ArticleTransformer());

        }

    //获取制定一篇文章
    public function show($id){
        return $this->response->item(Article::find($id),new ArticleTransformer());
    }
}
