<?php
namespace App\Services;

use App\Models\Keyword;
use App\Models\Rule;
use Houdunwang\WeChat\WeChat;

class WechatServices{
    //微信通信绑定
    public function __construct()
    {
        //与微信通信绑定
		//读取 config/hd_config.php配置文件
		//config()读取框架配置项,框架配置项读取 env 对应数据,env 数据来源我们自己后台
        //config函数是框架
        $config = config('hd_wechat');
        //dd($config);
        WeChat::config($config);
        WeChat::valid();
    }
    //加载规则视图文件
    public function ruleView($rule_id = 0){
        //dd($rule_id);
        //根据规则 id 去规则表找旧数据
        $rule = Rule::find($rule_id);
        //dd($rule->toArray());
        $ruleData = [
            'name'=>$rule?$rule['name']:'',//规则名称
            //获取的是keywords数组里面键值里面中键名为key的内容
            'keywords'=>$rule?$rule->keyword()->select('key')->get()->toArray():[],
        ];
        //dd($ruleData);
        return view('wechat.layouts.rule',compact('ruleData'));
    }
    //添加数据
    public function ruleStore($type){
        $post = request()->all();
        //dd($post);
        //讲 post 提交来的 rule 数据转为数组格式
        $rule = json_decode($post['rule'],true);
        //执行规则表的添加 自定义规则
        \Validator::make($rule,[
            'name'=>'required'
        ],['name.required'=>'规则名称不能为空'])->validate();
        //添加进数据库
        $ruleModel = Rule::create(['name'=>$rule['name'],'type'=>$type]);
        //关键词表添加
        foreach ($rule['keywords'] as $value){
            Keyword::create([
                'rule_id'=>$ruleModel['id'],
                'key'=>$value['key']
            ]);
        }
        //最后把规则对象返回
        return $ruleModel;
    }
    //编辑数据
    public function ruleUpdate($rule_id){
        //执行规则表的编辑
        $rule = Rule::find($rule_id);
        //dd($rule);
        $post = request()->all();
        //dd($post);
        $ruleData = json_decode($post['rule'],true);
        $rule->update(['name'=>$ruleData['name']]);
        //关键词表编辑
        //原来的关键词删除
        $rule->keyword()->delete();
        foreach ($ruleData['keywords'] as $value){
            Keyword::create([
                'rule_id'=>$rule_id,
                'key'=>$value['key']
            ]);
        }
    }
}



