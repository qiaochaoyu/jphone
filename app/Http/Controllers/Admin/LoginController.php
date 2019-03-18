<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder; 
use Gregwar\Captcha\PhraseBuilder;
use Session;
use Hash;
use App\Models\Users;
class LoginController extends Controller
{
    /**
     * 加载页面
     */
    public function index()
    {	
    	
    	return view('Admin.Login.index');
    }

    /**
     * 处理验证登录
     */
    public function dologin(Request $request)
    {	
        // 处理验证码
        $this->validate($request, [
            'captcha' => 'required|captcha',
        ],[
            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '验证码输入不正确'
        ]);

        //接收数据
        $data = $request->except('_token');
        //根据用户名去查询数据
        $user = Users::where('uname','=',$data['uname'])->first();
     	//dd($user);
     	
        //如果有用户 再验证密码
	        if ($user) {
	        	//解密密码 且验证
	        	$res = Hash::check($data['upass'],$user->upass);
	        	//获取该用户的权限
	        	$res2 = $user->auth;
	        	if ($res) {
	        		if( $res2 == 1 || $res2 == 2 ){
		        		//如果匹配成功 就存入session
		        		session(['flag'=>true]); 
		    			session(['id'=>$user->id]);
		    			session(['uname'=>$data['uname']]);
		    			session(['nickname'=>$user->nickname]);
		    			session(['face'=>$user->face]);
		    			return redirect('/admin/index')->with('success','登录成功');
	    			}else{
	    				return redirect('/admin/login')->with('error','您不是管理员,无法登录'); 
	    			}
	        	}else{
	        		return redirect('/admin/login')->with('error','输入密码错误');
	        	}
		    }else{
		        	return redirect('/admin/login')->with('error','用户名不存在');
		    }
    }

    /**
     * 退出登录
     */
    public function logout()
    {
    	session(['flag'=>null]);
    	session(['id'=>null]);
    	session(['uname'=>null]);
    	session(['nickname'=>null]);
    	session(['face'=>null]);
    	
    	return redirect('admin/login')->with('success','退出成功');
    }

}
