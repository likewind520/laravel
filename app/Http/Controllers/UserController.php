<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    //登录页面
    public function login()
    {
        return view('user.login');
    }

    //登录提交
    public function loginForm(Request $request)
    {
        //获得提交数据
        //dd($request->toArray());
        //验证 //dd($this);middleware中间件
        $this->validate(
            $request,
            [
                //邮箱类型和密码不能为空以及至少需要三位
                'email' => 'email',
                'password' => 'required|min:3',

            ],
            [
                //把默认的英文提示信息改为中文
                'email.email' => '请输入邮箱',
                'password.required' => '请输入登录密码',
                'password.min' => '密码不得小于三位',
            ]
        );
        //执行登录
        $validate = $request->only('email', 'password');
        //dd($validate);
        //\Auth::attempt()框架中自带的自动验证系统
        if (\Auth::attempt($validate)) {
            return redirect()->route('home')->with('success', '登录成功');
        }

        //登录失败返回
        return redirect()->back()->with('danger', '登录失败');
    }

    //重置密码
    public function password_reset()
    {
        return view('user.password_reset');

    }

    //重置密码提交
    public function password_resetForm(PasswordResetRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            //更新密码
            $user->password = bcrypt($request->password);
            $user->save();
            //重向定义跳转
            return redirect()->route('login')->with('success', '重置成功');
        }
        return redirect()->back()->with('danger', '邮箱已注册');
    }


    //注销登录
    public function logout()
    {
        //框架自带的
        \Auth::logout();

        return redirect()->route('home');
    }

    //注册页面
    public function register()
    {
        return view('user.register');
    }

    //用户提交数据
    public function store(UserRequest $request)
    {
        //dd($request->all());
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        //提示并跳转
        return redirect()->route('login')->with('success', '注册成功');
    }

}
