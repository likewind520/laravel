<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Button;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ButtonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Button  $button
     * @return \Illuminate\Http\Response
     */
    public function destroy(Button $button)
    {
        //
    }
}
