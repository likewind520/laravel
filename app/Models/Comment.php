<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Comment extends Model
{
    //引入 trait 类
    use LogsActivity;
    //设置记录动态的属性properties,这些属性允许被写入这个字段中,和notifications中的data属性一样
    protected $fillable = ['content','article_id'];
    //如果需要记录所有$fillable设置的填充属性，可以使用
    protected static $logFillable = true;
    //模型情况下将包括：`created` `updated` `deleted`，
    //可以设置模型属性`$recordEvents`来进行自定义
    protected static $recordEvents = ['created','updated'];
    //自定义日志名称
    protected static $logName = 'comment';
    //格式化时间
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
    //评论关联通知
    public function article(){
        return $this->belongsTo(Article::class);
    }
}
