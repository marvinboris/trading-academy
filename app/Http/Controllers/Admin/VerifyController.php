<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyController extends Controller
{
    //
    public function get()
    {
        $verifications = Verification::where('status', 0)->latest()->get();
        $data = [
            'list' => $verifications,
            'class' => 'table-dark',
            'table' => [
                ['key' => 'User ID', 'value' => function ($item) {
                    return $item->user->ref;
                }],
                ['key' => 'Name', 'value' => function ($item) {
                    return $item->user->name();
                }],
                ['key' => 'E-Mail Address', 'value' => function ($item) {
                    return $item->user->email;
                }],
                ['key' => 'Phone Number', 'value' => function ($item) {
                    return $item->user->phone;
                }],
                ['key' => 'Action', 'value' => function ($item) {
                    return '<a href="' . route('admin.about-user.verifications.show', $item->user->ref) . '" class="btn btn-green btn-sm"><i class="fas fa-edit"></i></a>';
                }],
            ],
            'headBgColor' => 'green',
            'bodyBgColor' => '',
        ];

        return view('admin.about-user.verifications.pending', [
            'data' => $data
        ]);
    }

    public function show($ref)
    {
        $verification = Verification::where('user_id', User::where('ref', $ref)->first()->id)->first();

        return view('admin.about-user.verifications.show', [
            'verification' => $verification
        ]);
    }

    public function post($ref, Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $user = User::where('ref', $ref)->first();
        $verification = Verification::where('user_id', $user->id)->first();
        
        $request->validate([
            'comment' => 'nullable'
        ]);

        $verification->update([
            'admin_id' => $admin->id,
            'comment' => $request->comment,
            'status' => 1 + $request->approved
        ]);

        $user->update([
            'is_verified' => $request->approved
        ]);

        return redirect()
            ->back()
            ->with('success', 'Verification request successfully updated.');
    }
    
    public function cancelled()
    {
        $verifications = Verification::where('status', 1)->latest()->get();
        $data = [
            'list' => $verifications,
            'class' => 'table-dark',
            'table' => [
                ['key' => 'User ID', 'value' => function ($item) {
                    return $item->user->ref;
                }],
                ['key' => 'Name', 'value' => function ($item) {
                    return $item->user->name();
                }],
                ['key' => 'E-Mail Address', 'value' => function ($item) {
                    return $item->user->email;
                }],
                ['key' => 'Phone Number', 'value' => function ($item) {
                    return $item->user->phone;
                }],
                ['key' => 'Action', 'value' => function ($item) {
                    return '<a href="' . route('admin.about-user.verifications.show', $item->user->ref) . '" class="btn btn-green btn-sm"><i class="fas fa-edit"></i></a>';
                }],
            ],
            'headBgColor' => 'green',
            'bodyBgColor' => '',
        ];

        return view('admin.about-user.verifications.cancelled', [
            'data' => $data
        ]);
    }
    
    public function approved()
    {
        $verifications = Verification::where('status', 2)->latest()->get();
        $data = [
            'list' => $verifications,
            'class' => 'table-dark',
            'table' => [
                ['key' => 'User ID', 'value' => function ($item) {
                    return $item->user->ref;
                }],
                ['key' => 'Name', 'value' => function ($item) {
                    return $item->user->name();
                }],
                ['key' => 'E-Mail Address', 'value' => function ($item) {
                    return $item->user->email;
                }],
                ['key' => 'Phone Number', 'value' => function ($item) {
                    return $item->user->phone;
                }],
                ['key' => 'Action', 'value' => function ($item) {
                    return '<a href="' . route('admin.about-user.verifications.show', $item->user->ref) . '" class="btn btn-green btn-sm"><i class="fas fa-edit"></i></a>';
                }],
            ],
            'headBgColor' => 'green',
            'bodyBgColor' => '',
        ];

        return view('admin.about-user.verifications.approved', [
            'data' => $data
        ]);
    }
}
