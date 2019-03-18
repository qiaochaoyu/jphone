<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Answers;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        // 确定表单数据要求
    	$this->validate($request, [
		    'acontent' => 'required',
		],[
			'acontent.required' => '回复内容不能为空',
		]);
		// 接受表单数据
    	$data = $request->except('_token');
    	// 创建模型对象，并用表单数据为模型对象赋值
    	$answers = new Answers;
    	$answers -> rid = $data['rid'];
        $answers -> uid = session('homeuser')->id;
    	$answers -> tid = $data['tid'];
    	$answers -> acontent = $data['acontent'];
    	//保存模型对象
    	$res = $answers -> save();
        // 根据返回结果重定向到指定路由
    	if($res){
    		return redirect("/topics/$answers->tid") -> with('success','跟帖成功');
    	} else {
    		return redirect("/topics/$answers->tid") -> with('error','跟帖失败');
    	}
    }
}
