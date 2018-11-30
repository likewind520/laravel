<?php

namespace App\Http\Controllers\Wechat;

use App\Services\WechatServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
        public function handler(WechatServices $wechatServices){
            //在此之前需要在个人中心里把微信的配置项更改为微信测试号appID/appsecret
            //那么会在远程服务器中的env处保存.
            //然后再去config中的hd_wechat.php中把'token'/'appid''appsecret'值改为大写.
              //因为我们在远程服务器中的env保存的就是大写
            //在地址栏中输入 http://lmz.huliming.cn/wechat/api/handler

            //echo 11; 测试输入的地址是否成功,成功后将地址复制到微信公众号中的
            //接口配置信息中
        }
}
