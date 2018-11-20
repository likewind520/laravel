<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth',[
            //'only'=>['create','store','edit','update','destroy'],
            //没登录除了首页和展示页都不能操作
            'except'=>['index','show']
        ]);
    }

    public function index(Request $request)
    {
        //测试模型关联
        //$article=Article::find(10);
        //dd($articles->toArray()); //二维数组 把变量分配到页面上
        //dd($article->category->article->toArray());
        //测试策略
        //$data=Article::find(10);
            //dd($request->toArray());
        $category = $request->query('category');
        $articles = Article::latest();
        if($category){
            $articles = $articles->where('category_id',$category);
        }
        $articles=$articles->paginate(10);
        $categories=Category::all();
        return view('home.article.index',compact('articles','categories'));
    }


    public function create()
    {
        //获得栏目表中的说有数据，通过变量分配到页面上循环
        $categories=Category::all();
        //dd($categories->toArray());
        return view('home.article.create',compact('categories'));
    }


    public function store(ArticleRequest $request,Article $article)
    {
        //获得提交过来的文章内容数据
        //dd($request->all());
        //dd(auth()->id());
        //dd($article->toArray()); 空数组  $article文章表模型
        $article->title=$request->title;
        $article->user_id=auth()->id();
        $article->category_id=$request->category_id;
        $article->content=$request['content'];
        $article->save();
        return redirect()->route('home.article.index')->with('success','发表成功');
    }


    public function show(Article $article)
    {
        return view('home.article.show',compact('article'));
    }


    public function edit(Article $article)
    {
        $this->authorize('update',$article);
        $categories = Category::all();
        //dd($article->toArray());
        return view('home.article.edit',compact('categories','article'));

    }


    public function update(ArticleRequest $request, Article $article)
    {
        $this->authorize('update',$article);
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->content = $request['content'];
        //$article->user_id = auth()->id();
        //dd($article);
        $article->save();
        return redirect()->route('home.article.index')->with('success','文章编辑成功');
    }


    public function destroy(Article $article)
    {
        $this->authorize('delete',$article);
        $article->delete();
        return redirect()->route('home.article.index')->with('success','文章删除成功');
    }
}
