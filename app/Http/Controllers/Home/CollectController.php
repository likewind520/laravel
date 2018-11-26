<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectController extends Controller
{
    public function make(Request $request){

        //dd($request->toArray());
        $type=$request->query('type');
        $id=$request->query('id');
        $class='App\Models\\'.ucfirst($type);
        $model = $class::find($id);  //文章
        if($collect = $model->collect->where('user_id',auth()->id())->first()){
            //执行删除
            $collect->delete();
        }else{
            //执行添加
            //dd($model->zan()->create());
            $model->collect()->create(['user_id'=>auth()->id()]);
        }
        return back();
    }

}
