<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //登录页面
    public function login(){
        return view('user.login');
    }
    //注册页面
    public function register(){
        return view('user.register');
    }
    //用户提交数据
   public function store(UserRequest $request){
       //dd($request->all());

   }

}
