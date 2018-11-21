<?php

namespace App\Http\Controllers\Util;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //图像上传
    public function upload(Request $request){
        //dd(1);
        //dd(asset(''));默认到public找文件，返回相对路径 //"http://laravel-cms.edu/"
        //'file'是dd($_FILES);的键名
       $file=$request->file('file');
       $path = $file->store('attachment','attachment');
        auth()->user()->attachment()->create([
            //$file->getClientOriginalName()获取客户端原始文件名
            'name'=>$file->getClientOriginalName(),
            'path'=>url($path)
        ]);






    }
    public function filesLists(){

    }
}
