<?php

namespace App\Http\Controllers\Admin;

use App\Expense;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpensesController extends Controller
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

        $expenses = Expense::latest()->paginate($show);
        $all = Expense::latest()->get();
        $data = [
            'links' => [
                'base' => 'admin.expenses.',
                'index' => 'Expenses list',
                'create' => 'Add an Expense',
                'edit' => 'Edit an Expense',
            ],
            'list' => $expenses,
            'all' => $all,
            'table' => [
                ['key' => 'Amount', 'value' => function ($item) {
                    return $item->amount;
                }],
                ['key' => 'Comment', 'value' => function ($item) {
                    return $item->comment;
                }],
                ['key' => 'Date', 'value' => function ($item) {
                    return $item->created_at->format('D, d M Y');
                }],
            ],
            'headBgColor' => 'green',
            'bodyBgColor' => 'light',
        ];
        return view('pages.admin.expenses.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.expenses.create');
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
            'amount' => 'required|numeric',
            'comment' => 'required'
        ]);

        Expense::create([
            'amount' => $request->amount,
            'comment' => $request->comment,
        ]);

        return redirect()
            ->route('admin.expenses.index')
            ->with('success', 'Expense successfully added.');
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
