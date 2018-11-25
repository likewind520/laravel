<?php

namespace App\Http\Controllers\Home;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    public function index(Request $request,Comment $comment)
    {
        //dd($comment->get()->toArray());
        //dd($request->all());
        $comments=$comment->with('user')->where('article_id',$request->article_id)->get();
       //dd($comments->toArray());
        return ['code'=>1,'message'=>'','comments'=>$comments];

    }

    public function store(Request $request,Comment $comment)
    {
        //dd($request->all());
        //执行添加评论
        $comment->user_id= auth()->id();
        $comment->article_id=$request->article_id;
        $comment->content=$request['content'];
        $comment->save();
        //dd($comment);
        //当前发的这条数据
        $comment = $comment->with('user')->find($comment->id);
        //dd($comment->toArray());
        return ['code'=>1,'message'=>'','comment'=>$comment];



    }

}
