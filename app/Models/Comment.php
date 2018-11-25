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

}
