<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 验证登录
        if (session('flag')) {
            // 执行下一次请求 通过
            return $next($request);
        }else{
            // 跳转到登录页面
            // return view('Admin.Login.index',['noLogin'=>true]);
            return redirect('/admin/login')->with('error','请先登录');
        }
        
    }
}
