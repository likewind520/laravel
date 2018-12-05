<?php

namespace App\Http\Controllers\Wechat;

use App\Models\ResponseNews;
use App\Services\WechatServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ResponseNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth',[
            'except'=>[],
        ]);
    }
    public function index()
    {
        $field=ResponseNews::all();
       return view('wechat.response_news.index',compact('field'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(WechatServices $wechatServices)
    {
        $ruleView = $wechatServices->ruleView();
        return view('wechat.response_news.create',compact('ruleView'));
    }


    public function store(Request $request,WechatServices $wechatServices)
    {
        //dd($request->all());
        //开启事务
        DB::beginTransaction();
        //dd($request->data);
        $rule = $wechatServices->ruleStore('news');
        //添加回复内容
        ResponseNews::create([
            'data'=>$request['data'],
            'rule_id'=>$rule['id'],
        ]);
        //事务提交
        DB::commit();
        return redirect()->route('wechat.response_news.index')->with('success','操作成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResponseNews  $responseNews
     * @return \Illuminate\Http\Response
     */
    public function show(ResponseNews $responseNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResponseNews  $responseNews
     * @return \Illuminate\Http\Response
     */
    public function edit(ResponseNews $responseNews,WechatServices $wechatServices)
    {

        $ruleView = $wechatServices->ruleView($responseNews['rule_id']);
        return view('wechat.response_news.edit',compact('ruleView','responseNews'));
    }


    public function update(Request $request, ResponseNews $responseNews,WechatServices $wechatServices)
    {

        //开启事务
        DB::beginTransaction();
        //dd($responseText);
        //更新规则表和关键词表
        $wechatServices->ruleUpdate($responseNews['rule_id']);
        //更新回复表
        $responseNews->update([
            'data'=>$request['data'],
            'rule_id'=>$responseNews['rule_id'],
        ]);
        //事务提交
        DB::commit();
        return redirect()->route('wechat.response_news.index')->with('success','操作成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResponseNews  $responseNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResponseNews $responseNews)
    {
        $responseNews->rule()->delete();
        return redirect()->route('wechat.response_news.index')->with('success','操作成功');
    }
}
