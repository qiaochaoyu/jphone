<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Hash;
use DB;
class LoginController extends Controller
{


    /**
     * 登录页面
     */
    public function login()
    {
        // 加载视图
    	return view('Home.Login.login');
    }

    /**
     * 前台登录
     */	
    public function dologin(Request $request)
    {
    	// 获取login页面传过来的数据
    	$data = $request->except('_token');
    	// 将用户名字段加入闪存中
    	$request->flashOnly('uname');
    	// 查询数据库中是否有这条数据
    	$users = Users::where('uname',$data['uname'])->first();
    	// 判断 如果没有就返回 重新登陆
    	if(!$users){
    		return redirect('/home/login')->with('error','用户名不存在');
    	}
    	// 验证密码
    	if(!Hash::check($data['upass'],$users['upass'])){
    		return back()->with('error','密码错误');
    	}
    	// 把登录信息传到session
    	session(['homeuser'=>$users]);
        // 登录增加积分
        // 获取上次登陆时间
        $lasttime = $users->lasttime;
        // 截取Y-m-d
        $last = substr($lasttime,0,10);
        // 判断上次登录和时间和今天的日期
        if (!$last == date('Y-m-d')) {
            // 如果不相等则积分加十
            $users->ascore += 10;
            // dd($users->ascore);
            $users->save();
        }

    	// 登陆时间 IP地址
    	DB::table('users')->where('id',$users['id'])->update(['lasttime'=>date("Y-m-d H:i:s",time()),'ip'=>$_SERVER['REMOTE_ADDR']]);
       if (session('url')) {
            return redirect(session('url'));
       } else {
            return redirect('/');
       }
    }

    /**
     * 退出登录
     */
    public function loginout(Request $request)
    {
    	// 删除session中的信息
    	$request->session('homeuser')->flush();
    	// $url = $request->url();
    	return back();
    }

    /**
     * 忘记密码
     */
    public function findpwd()
    {
        // 加载视图
    	return view('Home.Login.findpwd');
    }

    /**
     * 判断验证码
     */
    public function dofindpwd(Request $request)
    {
        // 获取数据
    	$data = $request->except('_token');
        // 通过cellphone查找到这条数据
    	$res1 = Users::where('uname',$data['cellphone'])->first();
    	// 获取输入的验证码
    	$cellphoneCode = $data['cellphoneCode'];
    	$uname = session(['uname' => $data['cellphone']]);
   		// 验证数据
        $this->validate($request,[
            'cellphone' => 'required|regex:/^1[345678]{1}\d{9}$/', 
            'cellphoneCode' => 'required' 
        ],[
            'cellphone.required' => '请输入手机号',
            'cellphone.regex' => '请输入正确的手机号',
            'cellphoneCode.required' => '请输入验证码'
        ]);
        // 判断验证码
   		if (session('yzcode') != $cellphoneCode) {
            return back()->with('error','验证码错误');
        }
        // 判断手机号
        if($data['cellphone'] && $data['cellphoneCode']){
        	if ($res1) {
        		return redirect('/home/findpwd/uppwd');
	        } else {
	        	return back()->with('error','该手机号未注册！');
	        }
    	} else {
    		return back()->with('error','手机号或验证码不能为空！');
    	}
        
   	}
   	/**
   	 * 修改密码
   	 */
   	public function uppwd(Request $request)
   	{
        // 加载视图
   		return view('Home.Login.uppwd');
   	}

    /**
     * 发送短信
     */	
    public function info()
    {
        // 加载视图
    	return view('Home.Login.sendPhone');
    }

    /**
     * 验证修改密码
     */
    public function save(Request $request)
    {
        // 获取数据
    	$data = $request->except('_token','restPwdToken');
        // 判断两次密码是否一致
    	if ($data['newPass'] != $data['checkPass']) {
    		return back()->with('error','两次密码不一致，请重新输入。');
    	}
    	// dump($request->session()->get('uname'));
        // 获取session中的uname
    	$uname = session()->get('uname');
        // 查找这条数据
    	$users = Users::where('uname',$uname)->first();
        // 把新密码保存到数据库
    	$users->upass = Hash::make($data['newPass']);
    	$res = $users->save();
        // 判断结果
    	if ($res) {
    		return redirect('/home/login')->with('success','修改成功，请登录！');
    	} else {
    		return back()->with('error','修改失败');
    	}
    	
    }



}
