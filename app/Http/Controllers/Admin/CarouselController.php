<?php

namespace App\Http\Controllers\Admin;

use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarouselController extends Controller
{

    public function index(Request $request)
    {
            $carousels=Carousel::all();
            //dd($carousels);
        return view('admin.carousel.index',compact('carousels'));
    }

    //加载添加轮播图模板
    public function create()
    {
        return view('admin.carousel.create');
    }

    public function store(Request $request,Carousel $carousel)
    {
        //添加到数据库保存
        //dd($request->all());
        $carousel->name = $request->name;
        $carousel->icon =$request->icon;
        $carousel->save();
        return redirect()->route('admin.carousels.index')->with('success','添加成功');

    }
    //通过资源路由建立的控制器,即使不需要也不能删除
    public function show(Carousel $carousel)
    {

    }
    public function edit(Carousel $carousel)
    {
        //加载编辑模板
        //dd($carousel->toArray());
        return view('admin.carousel.edit',compact('carousel'));
    }
    //编辑数据
    public function update(Request $request,Carousel $carousel)
    {

        $carousel->update($request->all());
        return redirect()->route('admin.carousels.index')->with('success','编辑成功');

    }
    public function destroy(Carousel $carousel)
    {
        //删除图片
        $carousel->delete();
        return redirect()->route('admin.carousels.index')->with('success','删除成功');
    }
}
