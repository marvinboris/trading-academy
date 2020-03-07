<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    //
    public function index() {
        $team = User::where('sponsor', Auth::user()->ref)->get();
        $data = [
            'list' => $team,
            'table' => [
                ['key' => 'User ID', 'value' => function ($item) { return $item->ref; }],
                ['key' => 'Name', 'value' => function ($item) { return $item->name(); }],
                ['key' => 'Phone Number', 'value' => function ($item) { return $item->phone; }],
                ['key' => 'E-Mail Address', 'value' => function ($item) { return $item->email; }],
                ['key' => 'Status', 'raw' => true, 'value' => function ($item) { return $item->email_verified_at ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>'; }],
            ],
            'headBgColor' => 'green',
            'bodyBgColor' => 'light',
        ];
        return view('pages.user.team', compact('data'));
    }
}
