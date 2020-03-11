<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutOnVerification
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
        if (Auth::check() && !Auth::user()->email_verified_at) {
            $user = Auth::user();
            Auth::logout();
            if (Session::has('new_registered')) {
                $request->session()->reflash();
                $request->session()->flash('not_verified', 'Account created successfully. We sent a mail to <strong class="text-green">' . $user->email . '</strong>. Please, check your mailbox and click on the activation link.');
            } else {
                $request->session()->flash('not_verified', 'Please, check your mailbox and click on the activation link.');
            }
            return redirect()
                ->route('login');
        }
        return $next($request);
    }
}
