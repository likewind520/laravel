<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\UploadException;
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
       //对上传文件进行拦截 Request规则是对表单而言，而文件上传是通过异步，二者不发生关系。
        $this->checkSize($file);
        $this->checkType($file);
        if($file) {
            $path = $file->store('attachment','attachment');
            //将上传数据存储到数据表
            //我们创建附件的模型与迁移文件
            //关联添加
            auth()->user()->attachment()->create(
                [
                    //$file->getClientOriginalName()获取客户端原始文件名
                    'name' => $file->getClientOriginalName(),
                    'path' => url($path)
                ]
            );
        }
        //dd($path);      "attachment/s0je06dwbSLbkyFVCpne7ZZpFkrxxBHwebirByR1.jpeg"
        //dd(url($path)); "http://laravel-cms.edu/attachment/GuVCtBLbnki8bS717Nmw8COG4AhvgIk3g5jnoCw3.jpeg"
        return ['file' =>url($path), 'code' => 0];

    }
    //验证上传大小
    private function checkSize($file){
        //$file->getSize()获取上传文件大小
        if($file->getSize() > hd_config('upload.size')){
            //return  ['message' =>'上传文件过大', 'code' => 403];
            //使用异常类处理上传异常
            //创建异常类:exception
            throw new UploadException('上传文件过大');
        }
    }
    //验证上传类型
    private function checkType($file){
        if(!in_array(strtolower($file->getClientOriginalExtension()),explode('|',hd_config('upload.type')))){
            //return  ['message' =>'类型不允许', 'code' => 403];
            throw new UploadException('类型不允许');
        }
    }
    //浏览图片
    public function filesLists(){
        $files = auth()->user()->attachment()->paginate(9);
        $data = [];
        foreach($files as $file){
            $data[] = [
                'url'=>$file['path'],
                'path'=>$file['path']
            ];
        }
       //dd($data);//相对路径
        return [
            'data'=>$data,
            'page'=>$files->links() . '',//这里一定要注意分页后面拼接一个空字符串
            'code'=> 0
        ];
    }
}
