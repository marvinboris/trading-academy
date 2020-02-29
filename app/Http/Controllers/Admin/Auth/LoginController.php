<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Mail\VerificationCode;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    /**
     * Show the login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    /**
     * Login the admin.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
                $hash = Crypt::encryptString([
                    'email' => $input['email'],
                    'password' => $input['password'],
                    'code' => $code,
                ]);
                $request->session()->flash('hash', $hash);
                return redirect(route('admin.verify'));
            }
        }
        $request->session()->flash('credentials', 'These credentials do not match our records.');
        return redirect()
            ->route('admin.login');
    }

    public function getVerify(Request $request)
    {
        $request->session()->reflash();
        if (Session::has('hash')) return view('auth.admin.verification');
        return redirect(route('admin.login'));
    }

    public function verify(Request $request)
    {
        $input = $request->validate([
            'code' => 'required|string'
        ]);

        $data = json_decode(Crypt::decryptString(Session::get('hash')));
        if ($input['code'] === $data['code']) {
            Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']]);
            return redirect(route('admin.dashboard'));
        }
        $request->session()->flash('invalid', 'Verification code is incorrect.');
        return back();
    }

    /**
     * Logout the admin.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.login')
            ->with('status', 'Admin has been logged out!');
    }
}
