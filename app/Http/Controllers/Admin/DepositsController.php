<?php

namespace App\Http\Controllers\Admin;

use App\Deposit;
use App\Http\Controllers\Controller;
use App\Method;
use App\Notifications\Deposit as NotificationsDeposit;
use App\User;
use Illuminate\Http\Request;

class DepositsController extends Controller
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

        $deposits = Deposit::latest()->paginate($show);
        $all = Deposit::latest()->get();
        $data = [
            'links' => [
                'base' => 'admin.deposits.',
                'index' => 'Deposits list',
                'create' => 'Add a Deposit',
                'edit' => 'Edit a Deposit',
            ],
            'list' => $deposits,
            'all' => $all,
            'table' => [
                ['key' => 'Amount', 'value' => function ($item) {
                    return $item->amount;
                }],
                ['key' => 'Method', 'value' => function ($item) {
                    return ($item->method->name);
                }],
                ['key' => 'Fees', 'value' => function ($item) {
                    return $item->fees;
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
        return view('pages.admin.deposits.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.deposits.create');
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
        $request->validate([
            'ref' => 'required|exists:users',
            'amount' => 'required|numeric',
        ]);

        $user = User::where('ref', $request->ref)->first();

        $deposit = Deposit::create([
            'method_id' => Method::where('name', 'Admin')->first()->id,
            'amount' => $request->amount,
            'user_id' => $user->id,
            'fees' => 0,
            'status' => 2
        ]);

        $user->update(['balance' => $user->balance + $request->amount]);
        $user->notify(new NotificationsDeposit($deposit));

        return redirect()
            ->route('admin.deposits.index')
            ->with('success', 'Successful deposit.');
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
