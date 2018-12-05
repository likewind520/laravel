<?php

namespace App\Http\Controllers\Role;

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
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
}
