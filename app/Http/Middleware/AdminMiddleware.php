<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        //persyaratan mengakses middleware ini harus admin
        if (!Auth::guest() && Auth::user()->admin) {
            return redirect('/');
        }

        // return $next($request);
        return $next($request);
    }
}
