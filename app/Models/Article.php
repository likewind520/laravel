<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Article extends Model
{
    //定义文章与用户的关联
public function user(){
    return $this->belongsTo(User::class);
}

public function category(){

    //定义栏目关联
    return $this->belongsTo(Category::class);
}
}
