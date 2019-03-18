<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WebsetStoreRequest extends FormRequest
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
        return [
            // 表单验证
            'wname'          =>'required|between:2,15',
            'wdescribe'      =>'required|between:5,100',
            'wurl'           =>'required',
            'wfiling'        =>'required',
            'wcright'        =>'required',
        ];
        
    }

    public function messages()
    {
    	return [
            'wname.required'         =>'请输入网站名称',
            'wname.between'          =>'网站名称必须在2-15位之间',
            'wdescribe.required'     =>'请输入网站描述',
            'wdescribe.between'      =>'网站描述必须在5~100之间',
            'wurl.required'          =>'请输入网站地址',
            'wfiling.required'       =>'请填写备案号信息',
            'wcright.required'       =>'请填写版权信息',
        ];
    }

}
