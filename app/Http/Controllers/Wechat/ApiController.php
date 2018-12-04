<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Keyword;
use App\Models\ResponseBase;
use App\Models\Rule;
use App\Services\WechatServices;
use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
        public function handler(WechatServices $wechatServices){
        //协助测试 数据
//       $rule = Rule::find(15);
       //获取所有对应的文本回复
//       $responseContent = json_decode($rule->responseText->pluck('content')->toArray()[0],true);
            //dd($responseContent);
      //从所有回复内容中每次随机一个
//       $content = array_random($responseContent)['content'];
       //dd($content);

       //测试获取对应图文数据
//      $rule = Rule::find(16);
      //dd($rule);
//        dd(json_decode($rule->responseNews->toArray()[0]['data'],true));
//        die;


            //在此之前需要在个人中心里把微信的配置项更改为微信测试号appID/appsecret
            //那么会在远程服务器中的env处保存.
            //然后再去config中的hd_wechat.php中把'token'/'appid''appsecret'值改为大写.
              //因为我们在远程服务器中的env保存的就是大写
            //在地址栏中输入 http://lmz.huliming.cn/wechat/api/handler

            //echo 11; 测试输入的地址是否成功,成功后将地址复制到微信公众号中的
            //接口配置信息中

            //消息管理模块
            $instance =WeChat::instance('message');
            //====关注事件====//
            //判断是否是关注事件
            if ($instance->isSubscribeEvent())
            {
                $content = ResponseBase::find(1);
                //向用户回复消息
                return $instance->text($content['data']['subscribe']);
            }
            //判断是否是文本消息
            if ($instance->isTextMsg())
            {
                //向用户回复消息
                //return $instance->text('后盾人收到你的消息了...:' . $instance->Content);
                //获取粉丝发送来的消息内容
                $content = $instance->Content;
                //根据消息内容去关键词表查找数据
                return $this->keyWordToFindResponse($instance,$content);
            }
            //======菜单事件=======//
            //消息管理模块
            $buttonInstance = WeChat::instance('button');
            //点击菜单拉取消息时的事件推送
            if ($buttonInstance->isClickEvent()) {
                //获取消息内容
                $message = $buttonInstance->getMessage();
                return $this->keyWordToFindResponse($instance,$message->EventKey);
                //向用户回复消息
                //return WeChat::instance('message')->text("点击了菜单,EventKey:{$message->EventKey}");
            }
    }
    //根据关键词回复内容
    private function keyWordToFindResponse($instance,$content){

        if($keyword = Keyword::where('key',$content)->first()){
            //通过关键词模型关联 rule
            $rule = $keyword->rule;
//            file_put_contents('abc.php',$rule['type']);
            //如果能找到对应的关键词
            if($rule['type'] =='text'){
                //文本消息
                //获取所有对应的文本回复
                $responseContent = json_decode($rule->responseText->pluck('content')->toArray()[0],true);
                //从所有回复内容中每次随机一个
                $content = array_random($responseContent)['content'];
                //回复粉丝
                return $instance->text($content);
            }elseif ($rule['type'] =='news'){
                //图文消息
                $news = json_decode($rule->responseNews->toArray()[0]['data'],true);
                return $instance->news([$news]);
            }
        }
//        //当匹配不到关键词的时候 执行默认回复
        $content = ResponseBase::find(1);
        return $instance->text($content['data']['default']);
    }
}
