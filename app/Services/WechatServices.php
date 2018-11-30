<?php
namespace App\Services;

use Houdunwang\WeChat\WeChat;

class WechatServices{

    public function __construct()
    {

        $config = config('hd_wechat');
        WeChat::config($config);
        WeChat::valid();
    }
}