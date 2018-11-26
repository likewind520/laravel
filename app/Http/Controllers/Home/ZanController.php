<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZanController extends Controller
{
    //点赞 和取消点赞 和之前的toggle一样(库中没有就添加,有就删除),现在用另一种方式
    public function make(Request $request){
        $type=$request->query('type');
        $id=$request->query('id');
        //dd($type);  "article"
        //dd($id);  "108"
        $class='App\Models\\'.ucfirst($type);
        //dd($class);  //"App\Models\article"
        //$model = Article::find($id);  //文章
        //$model = Comment::find($id);  //评论
        //dd($model);
        $model = $class::find($id);  //文章
        //dd($model);
        //获得当前文章/评论 的所有点赞模型数据
        //dd($model->zan->all()); 空 null
        //如果有数据(已经关注了),再点击就删除(取消)
        if($zan = $model->zan->where('user_id',auth()->id())->first()){
            //执行删除
            $zan->delete();
        }else{
            //执行添加
            //dd($model->zan()->create());
            $model->zan()->create(['user_id'=>auth()->id()]);
        }
        return back();
    }
}
