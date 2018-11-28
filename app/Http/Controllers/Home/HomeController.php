<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    //渲染模板页面
    public function index(){

        //获取所有动态
        $actives=Activity::latest()->paginate(5);
        return view('home.index',compact('actives'));
    }
    public function search(Request $request){
        //接受搜索的关键词
        $wd=$request->query('wd');
        //dd($wd);
        ////考虑有分类筛选
        /// //$category = $request->query('category');
        ////dd($wd);
        //$articles = Article::search($wd);
        //if($category){
        //	$articles = $articles->where('category_id',$category);
        //}
        //$articles  = $articles->paginate(1);
        //$categories = Category::all();
        //如果不考虑分类筛选
        $articles=Article::search($wd)->paginate(10);
        //return view('home.search',compact('articles','categories'));
        return view('home.search',compact('articles'));
    }
}
