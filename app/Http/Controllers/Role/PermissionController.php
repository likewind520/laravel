<?php

namespace App\Http\Controllers\Role;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth',[
            'except'=>[],
        ]);
    }
    //获取权限列表
    public function index(){
        $modules= Module::all();
       //dd($modules);

        return view('role.permission.index',compact('modules'));
    }
    //清除权限缓存
    public function forgetPermissionCache(){
        app()['cache']->forget('spatie.permission.cache');
        return back()->with('success','缓存清除成功');
    }
}
