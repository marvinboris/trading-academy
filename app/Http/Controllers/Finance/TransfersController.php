<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Mail\VerificationCode;
use App\Transfer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class TransfersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transfers = Auth::user()->transfers();
        $data = [
            'list' => $transfers,
            'table' => [
                ['key' => 'Sender', 'value' => function ($item) {
                    return $item->sender;
                }],
                ['key' => 'Receiver', 'value' => function ($item) {
                    return ($item->receiver);
                }],
                ['key' => 'Amount', 'value' => function ($item) {
                    return $item->amount;
                }],
                ['key' => 'Fees', 'value' => function ($item) {
                    return $item->fees;
                }],
                ['key' => 'Comments', 'value' => function ($item) {
                    return $item->comments;
                }],
                ['key' => 'Created at', 'value' => function ($item) {
                    return $item->created_at->diffForHumans();
                }],
            ],
            'headBgColor' => 'green',
            'bodyBgColor' => 'light',
        ];
        return view('user.finance.transfer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.finance.transfer.create');
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
            'policy' => 'accepted'
        ]);
        $code = User::ref();
        $amount = $request->amount;
        $comments = $request->comment;
        $receiver = User::where('ref', $request->ref)->first();
        $data = Crypt::encryptString(json_encode([
            'receiver' => $request->ref,
            'amount' => $amount,
            'code' => $code,
            'comments' => $comments
        ]));
        if ($request->media === 'email') Mail::to(Auth::user()->email)->send(new VerificationCode($code));
        $request->session()->flash('hash', $data);
        return view('user.finance.transfer.confirm', compact('amount', 'receiver'));
    }

    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {
        //
        $request->validate([
            'code' => 'required|string'
        ]);
        $request->session()->reflash();
        $sender = Auth::user();
        $data = json_decode(Crypt::decryptString(Session::get('hash')));

        if ($data->code == $request->code && $sender->balance >= $data->amount * 1.01) {
            $receiver = User::where('ref', $data->receiver)->first();
            $sender->update(['balance' => $sender->balance - $data->amount * 1.01]);
            $receiver->update(['balance' => $receiver->balance + $data->amount]);
            Transfer::create([
                'sender' => $sender->ref,
                'receiver' => $receiver->ref,
                'amount' => $data->amount,
                'fees' => $data->amount * .01,
                'comments' => $data->comments
            ]);
            return redirect()
                ->route('user.finance.transfers.index');
        }

        return redirect()
            ->back();
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
