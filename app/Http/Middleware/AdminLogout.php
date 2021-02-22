<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogout
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
            return $next($request);
        }
        return redirect('http://localhost:8080/');
    }
}
