<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd(1);
        //如果没有登录或不是管理员就让退回到home主页面
//        if (!auth()->check() || auth()->user()->is_admin != 1) {
//            return redirect()->route('home');
//        }
        if(!auth()->check() || !auth()->user()->can('Admin-admin-index')){
            return redirect()->route('home');
        }

        return $next($request);
    }
}
