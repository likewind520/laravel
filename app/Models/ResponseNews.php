<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponseNews extends Model
{

    //允许填充
    protected $fillable = ['data','rule_id'];
    //不允许填充
    //protected $guarded = [];
    public function rule(){
        return $this->belongsTo(Rule::class);
    }
}
