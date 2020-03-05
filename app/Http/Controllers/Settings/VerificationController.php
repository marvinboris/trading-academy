<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    //
    public function get()
    {
        $types = [
            'nic' => 'National Identity Card',
            'driving_license' => 'Driving License',
            'passport' => 'Passport',
            'voter_card' => "Voter's Card"
        ];

        return view('user.settings.verification', [
            'types' => $types
        ]);
    }

    public function post(Request $request)
    {
        $verification = Verification::where('user_id', Auth::id())->first();
        if ($verification->status === 0) {
            return redirect()
                ->route('user.settings.verification.get')
                ->with('danger', 'Verification request is being processed. Please wait for answer.');
        }

        $input = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'type' => 'required',
            'nid' => 'required',
            'expiry_date' => 'required|date',
            'doc_1' => 'required|file',
            'doc_2' => 'required|file',
            'doc_3' => 'required|file',
        ]);

        if ($file = $request->file('doc_1')) {
            $fileName = time() . $file->getClientOriginalName();
            $file->move('images/verifications', $fileName);
            $input['doc_1'] = htmlspecialchars($fileName);
        }
        if ($file = $request->file('doc_2')) {
            $fileName = time() . $file->getClientOriginalName();
            $file->move('images/verifications', $fileName);
            $input['doc_2'] = htmlspecialchars($fileName);
        }
        if ($file = $request->file('doc_3')) {
            $fileName = time() . $file->getClientOriginalName();
            $file->move('images/verifications', $fileName);
            $input['doc_3'] = htmlspecialchars($fileName);
        }

        $input['user_id'] = Auth::id();
        $input['status'] = 0;

        if (!$verification) $verification = Verification::create($input);
        else $verification->update($input);

        return redirect()
            ->route('user.settings.verification.get')
            ->with('success', 'Verification request has been sent.');
    }
}
