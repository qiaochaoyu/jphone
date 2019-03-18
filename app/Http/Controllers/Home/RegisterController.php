<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Hash;
class RegisterController extends Controller
{
    /**
     * 注册页面
     */
   	public function register()
   	{
   		// 加载视图
   		return view('Home.register');
   	}

   	/**
     * 注册验证
     */
   	public function doregister(Request $request)
   	{
      // 获取数据
   		$data = $request->except('_token');
   		// dump($data);
      // 把验证码赋值给一个变量
   		$yzcode = $data['yzcode'];
   		unset($data['yzcode']);
      // 获取session中的验证码
   		$value = $request->session()->get('yzcode');
   		// dump($value);
      // 验证数据
      $this->validate($request,[
          'phone' => 'required|unique:users,uname|regex:/^1[345678]{1}\d{9}$/', 
          'upass' => 'required|between:6,15', 
          'reupass' => 'required|same:upass', 
      ],[
          'phone.required' => '请输入手机号',
          'phone.unique' => '手机号已注册',
          'phone.regex' => '请输入正确的手机号',
          'upass.required' => '请输入密码',
          'upass.digits_between' => '密码格式不正确',
          'reupass.required' => '请确认密码',
          'reupass.same' => '两次密码不一致',
      ]);
      $request->flash();
      // 判断验证码是否一致
      if (session('yzcode') != $yzcode) {
          return back()->with('error','验证码错误');
      }
      // 清除session中的验证码
      $request->session()->forget('yzcode');
      // 存放数据
      $users = new Users();
      $users->uname = $data['phone'];
      $users->upass = Hash::make($data['upass']);
      $users->auth = 3;
      $users->nickname = 'jf'.$data['phone'];
      $users->face = 'images/'.'default.jpg';
      $res = $users->save();
      // 判断结果
      if ($res) {
              return redirect('home/login')->with('success','注册成功，请登录~~');
          } else {
              return back()->with('error','注册失败');
          }    

   	}

    /**
     * 发送短信验证码
     */
   	public function info()
   	{
   		// 加载视图
   		return view('Home.sendPhone');
   	}


}
