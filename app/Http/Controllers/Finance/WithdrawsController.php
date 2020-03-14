<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $show = $request->show ?? 10;

        $withdraws = Auth::user()->withdraws()->latest()->paginate($show);
        $all = Auth::user()->withdraws()->latest()->get();

        $data = [
            'list' => $withdraws,
            'all' => $all,
            'table' => [
                ['key' => 'Amount', 'value' => function ($item) {
                    return $item->amount;
                }],
                ['key' => 'Method', 'value' => function ($item) {
                    return ($item->method->name);
                }],
                ['key' => 'Comments', 'value' => function ($item) {
                    return $item->comments;
                }],
                ['key' => 'Date', 'value' => function ($item) {
                    return $item->created_at->format('D, d M Y');
                }],
                ['key' => 'Status', 'value' => function ($item) {
                    $statuses = [
                        'Pending',
                        'Failed',
                        'Success'
                    ];
                    return $statuses[$item->status];
                }],
            ],
            'headBgColor' => 'green',
            'bodyBgColor' => 'light',
        ];
        return view('pages.user.finance.withdraw.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $methods = Method::where('name', '!=', 'Admin')->where('is_active', 1)->get();
        return view('pages.user.finance.withdraw.create', [
            'methods' => $methods
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
