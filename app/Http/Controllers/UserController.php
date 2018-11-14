<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
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
        $data=$request->all();
       $data['password']=bcrypt($data['password']);
       User::create($data);
       //提示并跳转
       return redirect()->route('login')->with('success','注册成功');


   }

}
