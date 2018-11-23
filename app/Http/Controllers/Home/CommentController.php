<?php

namespace App\Http\Controllers\Home;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    public function index(Request $request)
    {


    }

    public function store(Request $request,Comment $comment)
    {
        //执行添加评论
        $comment->user_id= auth()->id();
        $comment->article_id=$request->article_id;
        $comment->content=$request['content'];
        $comment->save();
        dd($comment);



    }

}
