<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (!session('Admin')) {
            return redirect()->route('admin-login')->with('error','Bạn phải đăng nhập trước!');
        }
        return $next($request);
    }
}
