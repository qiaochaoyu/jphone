<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\Admin\WebsetController;
class ToggleMiddleware
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
        $data = WebsetController::webset();

        if (!$data->wstatu == 1) {
            return redirect('/errors/503');
        }
        return $next($request);
        


    }
}
