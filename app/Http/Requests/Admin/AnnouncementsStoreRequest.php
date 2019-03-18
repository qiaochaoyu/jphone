<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementsStoreRequest extends FormRequest
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
        //验证规则
        return [
            'title'   => 'required',
            // 'author'  => 'required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        //填写验证消息
        return[
            'title.required'   => '标题必填',
            //'author.required'  => '作者必填',
            'content.required' => '内容必填',
        ];
    }
}
