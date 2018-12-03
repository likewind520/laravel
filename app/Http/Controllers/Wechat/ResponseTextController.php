<?php

namespace App\Http\Controllers\Wechat;

use App\Models\ResponseText;
use App\Services\WechatServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ResponseTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //加载首页模板页面
    public function index()
    {
        //读取所有回复
        $field = ResponseText::all();
        return view('wechat.response_text.index',compact('field'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //加载添加模板页面
    public function create(WechatServices $wechatServices)
    {

        $ruleView=$wechatServices->ruleView();
        return view('wechat.response_text.create',compact('ruleView'));
    }


    public function store(Request $request,WechatServices $wechatServices)
    {
        //dd($request->all());
        //开启事务
        DB::beginTransaction();
        $rule = $wechatServices->ruleStore();
        //添加回复内容
        ResponseText::create([
            'content'=>$request['data'],
            'rule_id'=>$rule['id'],
        ]);
        //事务提交
        DB::commit();
        return redirect()->route('wechat.response_text.index')->with('success','操作成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResponseText  $responseText
     * @return \Illuminate\Http\Response
     */
    public function show(ResponseText $responseText)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResponseText  $responseText
     * @return \Illuminate\Http\Response
     */
    public function edit(ResponseText $responseText,WechatServices $wechatServices)
    {

         //dd($responseText);
        $ruleView = $wechatServices->ruleView($responseText['rule_id']);
        //获取回复内容的旧数据
        //dd($ruleView);
        return view('wechat.response_text.edit',compact('ruleView','responseText'));
    }
    //开启事务 以组的方式提交, 其中一个失败,其他的都不能写进数据库
    public function update(Request $request, ResponseText $responseText,WechatServices $wechatServices)
    {
        //开启事务
        DB::beginTransaction();
        //更新规则表和关键词表
        $wechatServices->ruleUpdate($responseText['rule_id']);
        //更新回复表
        $responseText->update([
            'content'=>$request['data'],
            'rule_id'=>$responseText['rule_id'],
        ]);
        //事务提交
        DB::commit();
        return redirect()->route('wechat.response_text.index')->with('success','更新成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResponseText  $responseText
     * @return \Illuminate\Http\Response
     */
    //删除
    public function destroy(ResponseText $responseText)
    {
        $responseText->rule()->delete();
        return redirect()->route('wechat.response_text.index')->with('success','操作成功');
    }
}
