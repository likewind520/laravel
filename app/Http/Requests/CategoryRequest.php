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
        //添加页面是没有category参数,也就是没有id,通过route list可查询，故打印为null
        //而编辑和删除是需要id的，因为添加和编辑都需要这个规则来验证,通过三元表达式来判定走哪个,
        //关键在于得到这个id,在编辑更新时把自己排除在外（在标题不更新只更新图标下
        $id=$this->route('category')?$this->route('category')->id:null;
        //unique:categories,title'.$id,
        //unique:模型表,title列'.该id数字,可以理解为在表中除了该id以外的数据中唯一
        return [
            'title'=>'required|unique:categories,title,'.$id,
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
