<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAuthorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userRole = auth()->user()->role;
        if($userRole !== 'admin' && $userRole !== 'author') {
            abort(403, 'شما دسترسی لازم برای ورود به این صفحه را ندارید!');
        }

        return $next($request);
    }
}
