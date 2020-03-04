<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    //
    public function get()
    {
        $languages = Language::get();

        return view('user.settings.change-password', [
            'languages' => $languages
        ]);
    }

    public function post(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $user = Auth::user();

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);

            return redirect()
                ->route('user.settings.change-password.get')
                ->with('success', 'Password has been successfully updated.');
        }

        return redirect()
            ->route('user.settings.change-password.get')
            ->with('danger', 'Password has not been updated.');
    }
}
