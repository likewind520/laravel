<?php

namespace App\Http\Controllers\Role;

use App\Models\Module;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin.auth',[
            'except'=>[],
        ]);
    }
    public function index()
    {
        //获取所有角色
        $roles = Role::paginate(10);
        //dd($roles);
        return view('role.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('role.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request->all());
        $this->validate($request,[
            'title'=>'required',
            'name'=>'required'
        ],[
            'title.required'=>'请输入站长中文名称',
            'name.required'=>'请输入站长英文标识'
        ]);
       Role::create($request->all());
       //dd($roles);
        return redirect()->route('role.role.index')->with('success','添加成功');
    }

    public function edit(Role $role)
    {

       return view('role.role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //dd(1);
        //dd($request->all());
        $role->update($request->all());
        return redirect()->route('role.role.index')->with('success','更新成功');
    }

    //删除
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.role.index')->with('success','更新成功');

    }

    //加载设置权限模板
    public function show(Role $role)
    {
        //dd(1);
        //获取所有模块以及权限,获取的 modules 所有数据
        $modules = Module::all();
        //dd($modules->all());
        return view('role.role.set_permission',compact('role','modules'));
    }
    //设置权限的提交数据
    public function setRolePermission(Role $role,Request $request){

        //dd(1);
        //给角色同步设置权限
        $role->syncPermissions($request->permissions);
        return redirect()->route('role.role.index')->with('success', '操作成功');
    }
}
