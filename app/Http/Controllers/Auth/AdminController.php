<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use Illuminate\Http\Request;
use App\Mail\VerificationCode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
        $input = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $input['email'])->first();

        if ($user) {
            if (Hash::check($input['password'], $user->password) && $user->is_admin === 1) {
                $code = User::ref();
                Mail::to($user->email)->send(new VerificationCode($code));
                $request->session()->flash('email', $input['email']);
                $request->session()->flash('password', $input['password']);
                $request->session()->flash('code', $code);
                return redirect(route('admin.verify'));
            }
        }
        $request->session()->flash('credentials', 'These credentials do not match our records.');
        return redirect(route('admin.login'));
    }

    public function getVerify(Request $request)
    {
        $request->session()->reflash();
        if (Session::has('code')) return view('auth.admin.verification');
        return redirect(route('admin.login'));
    }

    public function verify(Request $request)
    {
        $input = $request->validate([
            'code' => 'required|string'
        ]);

        if ($input['code'] === Session::get('code')) {
            Auth::attempt(['email' => Session::get('email'), 'password' => Session::get('password')]);
            return redirect(route('admin.dashboard'));
        }
        $request->session()->flash('invalid', 'Verification code is incorrect.');
        return back();
    }
}
