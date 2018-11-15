<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //渲染模板页面
    public function index(){
        return view('home.index');
    }
}
