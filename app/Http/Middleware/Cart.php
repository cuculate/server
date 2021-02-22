<?php

namespace App\Http\Middleware;

use Closure;

class Cart
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
        if(session('Cart') != null) {
            return $next($request);
        }
        return redirect()->route('cart')->with('error','Không có sản phẩm nào trong giỏ hàng');
    }
}
