<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    public function index()
    {
        return view('home.article.index');
    }


    public function create()
    {
        return view('home.article.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Article $article)
    {
        //
    }


    public function edit(Article $article)
    {
        //
    }


    public function update(Request $request, Article $article)
    {
        //
    }


    public function destroy(Article $article)
    {
        //
    }
}
