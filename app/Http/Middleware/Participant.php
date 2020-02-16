<?php

namespace App\Http\Middleware;

use Closure;

class Participant
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
        if (in_array(Auth::user()->role->name, ['Student', 'Teacher'])) {
            return route('login');
        }

        return $next($request);
    }
}
