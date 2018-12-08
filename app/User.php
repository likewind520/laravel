<?php

namespace App;

use App\Models\Attachment;
use App\Models\Collect;
use App\Models\Zan;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable,HasRoles;

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

    //重写 数据库通知中 获取所有通知的 notifications 方法
    public function notifications()
    {
        return $this->morphMany(DatabaseNotification::class, 'notifiable')->orderBy('read_at', 'asc')->orderBy('created_at', 'desc');
    }
    //默认图像
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
    //用户关联 collect
    public function collect(){

        return $this->hasMany(Collect::class);
    }

    /**
     * 获取将存储在JWT主题声明中的标识符.
     * 就是⽤用户表主键 id *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * 返回⼀一个键值数组，其中包含要添加到JWT的任何⾃自定义声明. *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }



}
