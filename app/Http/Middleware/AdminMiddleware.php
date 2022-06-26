<?php

namespace App\Http\Middleware;

use App\Services\Admin\Admin;
use Closure;

class AdminMiddleware
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
        if(!Admin::cekLogin()){
            return redirect()->route('masuk');
        }else{
            $route_name = $request->route()->getName();
            if($route_name === 'masuk'){
                return redirect()->route('admin.index');
            }
            return $next($request);
        }

    }
}
