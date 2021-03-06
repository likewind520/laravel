<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    protected $fillable=['user_id'];
    //多对一关联  多个收藏对应一个用户
    public function user(){
        return $this->belongsTo(User::class);
    }

    //获取多态关联模型 Article  video
    public function belongsModel(){
        return $this->morphTo('collect');
    }
}
