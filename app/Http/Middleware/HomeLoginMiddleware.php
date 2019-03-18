<?php

namespace App\Http\Middleware;

use Closure;

class HomeLoginMiddleware
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
        if(session('homeuser')){
            return $next($request);
        } else {
            return redirect('/home/login')->with('success','登录后才可执行后续操作哦☺');
        }
    }
}
