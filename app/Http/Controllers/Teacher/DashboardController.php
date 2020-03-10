<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'teacher']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        $balance = $user->balance;
        $team = $user->referrals();
        $sessions = Teacher::where('user_id', $user->id)->first()->sessions()->latest()->get();
        $teamTable = [
            'list' => $user->referrals(true, 5),
            'table' => [
                ['key' => 'User ID', 'value' => function ($item) { return $item->ref; }],
                ['key' => 'Name', 'value' => function ($item) { return $item->name(); }],
                ['key' => 'Phone Number', 'value' => function ($item) { return $item->phone; }],
                // ['key' => 'E-Mail Address', 'value' => function ($item) { return $item->email; }],
            ],
            'headBgColor' => 'green',
            'bodyBgColor' => 'light',
        ];
        $commissions = $user->commissions;
        $commission = 0;
        foreach ($commissions as $item) {
            $commission += $item->amount;
        }
        return view('pages.user.teacher.dashboard', compact('team', 'sessions', 'balance', 'commission', 'teamTable', 'commissions'));
    }
}
