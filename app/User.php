<?php

namespace App;

use App\Models\Attachment;
use App\Models\Zan;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //允许进入数据库的字段
    protected $fillable = [
        'name', 'email', 'password','email_verified_at','icon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getIconAttribute($key)
    {
        return $key?:asset('org/images/logos.ico');
    }
    //关联附件 一对多的关联hasMany
    public function attachment(){
        //return $this->hasMany(上传图片类,登录用户(外键),主键);后面两id可以省略
        //return $this->hasMany(Attachment::class,'user_id','id');
        return $this->hasMany(Attachment::class);

    }
    //获取指定用户的粉丝 多对多belongsToMany
    public function fans(){
        //$this->belongsToMany(登录用户(粉丝),被关注者,外键(登录用户(粉丝)),主键(被关注者));
       return $this->belongsToMany(User::class,'followers','user_id','following_id');


    }
    //获取关注的人
    public function following(){
        return $this->belongsToMany(User::class,'followers','following_id','user_id');
    }

    //用户关联 zan
    public function zan(){

        return $this->hasMany(Zan::class);
    }


}
