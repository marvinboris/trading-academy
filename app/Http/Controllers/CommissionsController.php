<?php

namespace App\Http\Controllers;

use App\Commission;
use Illuminate\Http\Request;

class CommissionsController extends Controller
{
    //
    public function index(Request $request)
    {
        $show = $request->show ?? 10;

        $commissions = Commission::latest()->paginate($show);
        $all = Commission::latest()->get();

        $data = [
            'list' => $commissions,
            'all' => $all,
            'table' => [
                ['key' => 'Date', 'value' => function ($item) { return $item->created_at; }],
                ['key' => 'User ID', 'value' => function ($item) { return $item->referral; }],
                ['key' => 'Amount', 'value' => function ($item) { return $item->amount; }],
            ],
            'headBgColor' => 'green',
            'bodyBgColor' => 'light',
        ];

        return view('pages.user.commissions', [
            'data' => $data
        ]);
    }
}
