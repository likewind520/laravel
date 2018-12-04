<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Button;
use App\Services\WechatServices;
use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ButtonController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth',[
            'except'=>[],
        ]);
    }
    public function index()
    {

       $buttons=Button::latest()->paginate(10);
       //dd($buttons);

        return view('wechat.button.index',compact('buttons'));

    }


    public function create()
    {
        return view('wechat.button.create');

    }


    public function store(Request $request)
    {
        //dd($request->all());
       Button::create($request->all());
       //dd(Button::create($request->all()));
       return redirect()->route('wechat.button.index')->with('success','菜单添加成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Button  $button
     * @return \Illuminate\Http\Response
     */
    public function show(Button $button)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Button  $button
     * @return \Illuminate\Http\Response
     */
    public function edit(Button $button)
    {
        //dd($button);
        return view('wechat.button.edit',compact('button'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Button  $button
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Button $button)
    {
        //编辑之后可以重新推送
        $data = $request->all();
        $data['status'] = 0;
        $button->update($data);
        return redirect()->route('wechat.button.index')->with('success','编辑成功');
    }


    public function destroy(Button $button)
    {
       $button->delete();
       return redirect()->route('wechat.button.index')->with('success','删除成功');
    }
    //推送
    public function push(Button $button,WechatServices $wechatServices){
        //将推送的数据库中json数据转化为数组
        $menu=json_decode($button['data'],true);
       //WeChat规定需要传递的是一个数组
        $res=WeChat::instance('button')->create($menu);
        //dd($res); 40019 报不合法的按钮key长度
        if($res['errcode'] == 0){
            //将当前菜单数据表 status 修改1,其余的改为0
            $button->update(['status'=>1]);
            Button::where('id','!=',$button->id)->update(['status'=>0]);
            return back()->with('success','菜单推送成功');
        }else{
            return back()->with('danger',$res['errmsg']);
        }
    }
}
