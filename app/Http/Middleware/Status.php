<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Status
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
        if (Auth::check() && Auth::user()->is_active === 0) {
            Auth::logout();
            return redirect()
                ->route('login')
                ->with('inactive', '
                Your account is not active. Please, contact the administrator.
            ');
        }

        return $next($request);
    }
}
