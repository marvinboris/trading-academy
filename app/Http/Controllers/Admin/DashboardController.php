<?php

namespace App\Http\Controllers\Admin;

use App\Commission;
use App\Deposit;
use App\Expense;
use App\Http\Controllers\Controller;
use App\Payment;
use App\User;
use App\Withdraw;
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
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $deposits = Deposit::whereStatus(2)->get();

        $total_deposit = 0;
        foreach ($deposits as $deposit) {
            $total_deposit += $deposit->amount;
        }

        $total_users = count(User::get());

        $paid_commissions = 0;
        foreach (Commission::get() as $commission) {
            $paid_commissions += $commission->amount;
        }

        $total_withdraw = 0;
        foreach (Withdraw::get() as $withdraw) {
            $total_withdraw += $withdraw->amount;
        }

        $total_fees = 0;
        foreach ($deposits as $deposit) {
            $total_fees += $deposit->fees;
        }

        $paid_courses = 0;
        foreach (Payment::get() as $payment) {
            $paid_courses += $payment->amount;
        }

        $expenses = 0;
        foreach (Expense::get() as $expense) {
            $expenses += $expense->amount;
        }

        $available_balance = $paid_courses - $expenses;

        $withdraws = Withdraw::latest()->limit(5)->get();
        $deposits = Deposit::latest()->limit(5)->get();

        return view('pages.admin.dashboard', [
            'total_deposit' => $total_deposit,
            'total_users' => $total_users,
            'paid_commissions' => $paid_commissions,
            'total_withdraw' => $total_withdraw,
            'total_fees' => $total_fees,
            'paid_courses' => $paid_courses,
            'expenses' => $expenses,
            'available_balance' => $available_balance,
            'withdraws' => $withdraws,
            'deposits' => $deposits,
        ]);
    }
}
