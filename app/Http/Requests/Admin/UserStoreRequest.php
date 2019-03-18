<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     *  存放验证规则
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
            'uname'     =>  'required|regex:/[a-zA-Z]{1,}[\w]{5,16}/', 
            'upass'     =>  'required|regex:/^[\w]{6,18}$/',
            //same 验证字段值和指定的 字段（ field ） 值是否相同。
            'repass'    =>  'required|same:upass',
            'nickname'  =>  'required',
            'phone'     =>  'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
            'email'     =>  'required',
            'face'      =>  'required',


        ];
    }

    public function messages()
    {
        //填写验证消息
        return [
            'auth.required'     => '权限必填',
            'uname.required'    => '用户名必填',
            'uname.regex'       => '用户名以数字字母下划线命名,且不能少于6位',
            'upass.required'    => '密码必填',
            'upass.regex'       => '密码不能少于6位数',
            'repass.required'   => '确认密码必填',
            'repass.same'       => '两次密码不一致',
            'nickname.required' => '昵称必填',
            'phone.required'    => '手机号必填',
            'phone.regex'       => '手机号格式不正确',
            'email.required'    => '邮箱必填',
            'face.required'     => '头像必填',
            
        ];


    }
}
