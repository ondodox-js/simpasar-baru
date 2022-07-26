<?php

namespace App\Http\Middleware;

use Closure;

class PedagangMiddleware
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
        $pedagang_cek = $request->session()->has('pedagang');

        if(!$pedagang_cek){
            return redirect()->route('u-pedagang');
        }else{
            $route_name = $request->route()->getName();
            if($route_name === 'u-pedagang'){
                return redirect()->route('pedagang.index');
            }
            return $next($request);
        }
    }
}
