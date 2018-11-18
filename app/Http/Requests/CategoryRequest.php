<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //先开启权限
        //dd(2); 检测用户已经登录
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //后定义规则
        //dd(3);
        //dd($this->all());
        //dd($this->route('category'));

        return [
            'title'=>'required|unique:categories',
            'icon'=>'required'

        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'请输入栏目名称',
            'title.unique'=>'栏目已存在',
            'icon.required'=>'请选择图标'
        ];
    }
}
