<?php

namespace App\Http\Controllers\Finance;

use App\Deposit;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Method\CryptoboxController;
use App\Http\Controllers\Method\MonetbilController;
use App\Method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $deposits = Auth::user()->deposits()->latest()->paginate($show);
        $all = Auth::user()->deposits()->latest()->get();

        $data = [
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
        return view('pages.user.finance.deposit.index', compact('data'));
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
        return view('pages.user.finance.deposit.create', [
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
        $method = Method::findOrFail($request->id);
        if ($method->is_active === 0)
            return redirect()
                ->back()
                ->with('danger', 'This deposit method is not available.');

        $user = Auth::user();

        $request->validate([
            'id' => 'numeric|required|exists:methods',
            'amount' => 'numeric|required',
        ]);

        $deposit = Deposit::create([
            'user_id' => $user->id,
            'method_id' => $request->id,
            'amount' => $request->amount,
            'comments' => $request->comments,
            'status' => 0
        ]);

        switch ($deposit->method->name) {
            case 'Mobile':
                new MonetbilController();
                $monetbil = MonetbilController::generateWidgetData([
                    'amount' => $request->amount,
                    'deposit_id' => $deposit->id
                ]);
                return redirect($monetbil['link']);
            case 'Bitcoin':
                return redirect(route('user.finance.deposits.cryptobox.get') . '?deposit_id=' . $deposit->id);
        }

        $deposit->update(['status' => 1]);

        return redirect()
            ->back()
            ->with('danger', 'Unavailable payment method.');
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
