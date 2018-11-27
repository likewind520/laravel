<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
    //关联用户
    public function user(){

        //一个用户可以发多条评论 多对一
        return $this->belongsTo(User::class);

    }
    //定义 zan 多态关联
    public function zan(){
        //第一个参数关联模型,第二个参数跟数据迁移  zan_id  zan_type
        return $this->morphMany(Zan::class,'zan');
    }

}
