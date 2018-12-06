<?php

namespace App\Http\Controllers\Role;

use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //用户管理 模板页面
    public function index()
    {
        //获得用户的所有数据
        $users=User::paginate(10);
        //dd($users->toArray());
        return view('role.user.index',compact('users'));
    }

    //展示用户设置角色模板
    public function userSetRoleCreate(User $user)
    {
        //获得所有角色
        $roles=Role::all();
        return view('role.user.set_role',compact('user','roles'));
    }
    //给 用户设置角色
    public function userSetRoleStore(User $user,Request $request){
//        dd($request->all());
//        dd($user);
        //用户同步角色
        $user->syncRoles($request->roles);
        return back()->with('success','设置成功');
    }
}