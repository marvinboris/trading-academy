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
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{
    /**
     * This trait has all the login throttling functionality.
     */
    use ThrottlesLogins;

    //Your other code here...

    /**
     * Username used in ThrottlesLogins trait
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Only guests for "admin" guard are allowed except
     * for logout.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

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
                $hash = Crypt::encryptString(json_encode([
                    'id' => $admin->id,
                    'code' => $code,
                ]));
                $request->session()->flash('hash', $hash);
                return redirect()
                    ->route('admin.verify');
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
        return redirect()
            ->route('admin.login');
    }

    public function verify(Request $request)
    {
        $input = $request->validate([
            'code' => 'required|string'
        ]);

        $data = json_decode(Crypt::decryptString(Session::get('hash')));
        if ($input['code'] === $data->code) {
            Auth::guard('admin')->login(Admin::findOrFail($data->id));
            return redirect()
                ->route('admin.dashboard');
        }
        return redirect()
            ->back()
            ->with('invalid', 'Verification code is incorrect.');
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
