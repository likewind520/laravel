<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    //加载模板页面
    // 并没有指点模型创建控制器 $name是路由中携带的参数,而这个参数是通过模板页面中的第二个参数的传递
    public function edit($name){
        //dd($name); //"base"/"upload"/"mail"...
        //dd(hd_config('upload.size'));

        //获取配置项数据
        $config=Config::firstOrNew(
            ['name'=>$name]
        );
       //dd($config['data']); //null
        return view('admin.config.edit_'.$name,compact('name','config'));
    }
    //创建 修改配置项
    public function update($name,Request $request){
        //updateOrCreate 执行更新或者添加
        $res=Config::updateOrCreate(
            ['name'=>$name],//查询条件
            //注意:$request->all()是数组,直接写入数据表报错
			//需要借助模型属性 cates 将数组转为json存入数据库
            ['name'=>$name,'data'=>$request->all()]//更新或者添加的数据
        );
       //执行这个命令 composer require houdunwang/laravel
        //就可以直接调用hd_edit_env()函数
        hd_edit_env($request->all());

        return back()->with('success','配置项更新成功');
    }

}
