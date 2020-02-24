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
        $admin = Admin::where('email', $input['email'])->first();

        if ($admin) {
            if (Hash::check($input['password'], $admin->password)) {
                $code = User::ref();
                Mail::to($admin->email)->send(new VerificationCode($code));
                $request->session()->flash('email', $input['email']);
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
            $admin = Admin::where('email', Session::get('email'))->first();
            Auth::login($admin);
            return redirect(route('admin.dashboard'));
        }
        $request->session()->flash('invalid', 'Verification code is incorrect.');
        return back();
    }
}
