<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //定义规则
        return [
            'title'=>'required',
            'category_id'=>'required',
            'content'=>'required'
        ];
    }
    //自定义提示
    public function messages()
    {
        return [
            'title.required'=>'请输入文章标题',
            'category_id.required'=>'请选择文章分类',
            'content.required'=>'请输入文章内容',
        ];
    }
}
