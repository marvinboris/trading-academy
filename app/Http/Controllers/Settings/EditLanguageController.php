<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditLanguageController extends Controller
{
    //
    public function get()
    {
        return view('user.settings.edit-language', [
            'languages' => Language::get(),
            'selected' => Auth::user()->lang
        ]);
    }

    public function post(Request $request)
    {
        $request->validate([
            'lang' => 'required|exists:languages'
        ]);

        $user = Auth::user();

        $user->update(['lang' => $request->lang]);

        return redirect()
            ->route('user.settings.edit-language.get')
            ->with('success', 'Language has been successfully updated.');
    }
}
