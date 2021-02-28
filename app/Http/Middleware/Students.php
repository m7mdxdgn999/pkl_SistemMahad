<?php

namespace App\Http\Middleware;

use Closure;

class Students
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
        if ($request->user()->level != 'mahasiswa') {
            return redirect()->route('LoginForm');
        }
        return $next($request);
    }
    
}
