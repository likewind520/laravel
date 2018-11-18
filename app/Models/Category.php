<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //$fillable白名单，允许字段进入数据表
    protected $fillable=[
        'title','icon'
    ];
}
