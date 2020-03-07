<?php

namespace App\Http\Controllers\Admin;

use App\Commission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommissionsController extends Controller
{
    //
    public function get()
    {
        $commissions = Commission::latest()->get();
        $data = [
            'list' => $commissions,
            'class' => 'table-dark',
            'table' => [
                ['key' => 'User ID', 'value' => function ($item) {
                    return $item->user->ref;
                }],
                ['key' => 'Purchaser User ID', 'value' => function ($item) {
                    return $item->referral;
                }],
                ['key' => 'Session ID', 'value' => function ($item) {
                    return $item->session->id;
                }],
                ['key' => 'Date', 'value' => function ($item) {
                    return $item->created_at;
                }],
                ['key' => 'Amount', 'value' => function ($item) {
                    return $item->amount;
                }]
            ],
            'headBgColor' => 'green',
            'bodyBgColor' => '',
        ];

        return view('pages.admin.about-user.commissions', [
            'data' => $data
        ]);
    }
}
