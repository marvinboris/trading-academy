<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Language;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function change_password()
    {
        $languages = Language::get();

        return view('pages.user.settings.change-password', [
            'languages' => $languages
        ]);
    }

    public function edit_language()
    {
        return view('pages.user.settings.edit-language', [
            'languages' => Language::get(),
            'selected' => Auth::user()->lang
        ]);
    }

    public function post(Request $request)
    {
        $user = Auth::user();

        if ($request->has('old_password')) {
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ]);

            if (Hash::check($request->old_password, $user->password)) {
                $user->update([
                    'password' => Hash::make($request->new_password)
                ]);

                return redirect()
                    ->route('user.settings.profile.change-password')
                    ->with('success', 'Password has been successfully updated.');
            }

            return redirect()
                ->route('user.settings.change-password')
                ->with('danger', 'Password has not been updated.');
        } else if ($request->has('lang')) {
            $request->validate([
                'lang' => 'required|exists:languages'
            ]);

            $user->update(['lang' => $request->lang]);

            return redirect()
                ->route('user.settings.profile.edit-language')
                ->with('success', 'Language has been successfully updated.');
        } else if ($request->has('photo')) {
            $request->validate([
                'photo' => 'required|file'
            ]);

            $photo_id = null;

            if ($file = $request->file('photo')) {
                $fileName = time() . $file->getClientOriginalName();
                $file->move('images', $fileName);
                if ($user->photo) {
                    unlink(public_path() . $user->photo->path);
                    $user->photo->path = htmlspecialchars($fileName);
                    $user->photo->save();
                } else {
                    $photo = Photo::create(['path' => htmlspecialchars($fileName)]);
                    $photo_id = $photo->id;
                    $user->update(['photo_id' => $photo_id]);
                }
            }

            return redirect()
                ->back()
                ->with('success', 'Profile photo has been successfully updated.');
        }
    }
}
