<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            //required  验证字段必须存在输入数据，且不为空
            'auth'      =>  'required',
            //正则匹配验证 regex 验证字段值是否符合指定的正则表达式。
            'uname'     =>  'required|regex:/^[a-zA-Z]{1,4}[\w]{6,16}$/', 
            'nickname'  =>  'required',
            'phone'     =>  'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
            'email'     =>  'required',
            'face'      =>  'required',
            'ascore'    =>  'required|regex:/^[\d]{1,10}$/',
        ];
    }

     public function messages()
    {
        //填写验证消息
        return [
            'auth.required'     => '权限必填',
            'uname.required'    => '用户名必填',
            'uname.regex'       => '用户名格式不正确',
            'nickname.required' => '昵称必填',
            'phone.required'    => '手机号必填',
            'phone.regex'       => '手机号格式不正确',
            'email.required'    => '邮箱必填',
            'face.required'     => '头像必填',
            'ascore.required'   => '积分必填',
            'ascore.regex'      => '积分格式不正确',
        ];


    }
}
