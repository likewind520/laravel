<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(11);
        //dd(Category::all());
        //把模型数据表里面的数据取出来
        hdHasRole('article-master');
        $categories=Category::paginate(10);

        //compact 变量分配到页面上执行数据循环
        return view('admin.category.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(1);
        hdHasRole('article-master');
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //dd(1);
       //dd($request->all());
        //调用Category模型中的create方法。把接收到的数据写入到数据表中
        hdHasRole('article-master');
        Category::create($request->all());
        return redirect()->route('admin.category.index')->with('success','创建成功');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        hdHasRole('article-master');
        //dd($category);获得的是所要编辑id的内容，然后变量分配到页面上
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //dd($request->all()); //修改后的后的数据
        //dd($category); //原数据表里面的所选id的数据
        hdHasRole('article-master');
        $category->update($request->all());
        return redirect()->route('admin.category.index')->with('success','编辑成功');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        hdHasRole('article-master');
        $category->delete();
        return redirect()->route('admin.category.index')->with('seccess','删除成功');

    }
}
