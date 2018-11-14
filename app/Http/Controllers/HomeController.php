<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //渲染模板页面
    public function index(){
        return view('home.index');
    }
}
