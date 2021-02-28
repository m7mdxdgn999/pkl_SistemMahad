<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class test
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

        if (Auth::check() && Auth::user()->level == 'admin') {
            // abort(403);
            return $next($request);
        }
        return redirect()->route('404');
        
    }


    // public function handle($request, Closure $next)
    // {
    //     if (Auth::check() && Auth::user()->level == 'admin') {
    //         return $next($request);
    //     }
    //     abort(403);
    // }
}
