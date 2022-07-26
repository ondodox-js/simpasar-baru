<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleware
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
        $log_admin = $request->session()->has('admin');
        $log_pedagang = $request->session()->has('pedagang');

        if($log_admin) {
            return redirect()->route('admin.index');
        }elseif($log_pedagang){
            return redirect()->route('pedagang.index');
        }else{
            return $next($request);
        }
    }
}
