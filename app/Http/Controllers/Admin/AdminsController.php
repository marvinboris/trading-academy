<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = Admin::get();
        $data = [
            'links' => [
                'base' => 'admin.admins.',
                'index' => 'Admins list',
                'create' => 'Add an Admin',
                'edit' => 'Edit an Admin',
            ],
            'list' => $admins,
            'table' => [
                ['key' => 'User ID', 'value' => function ($item) { return $item->user->ref; }],
                ['key' => 'Name', 'value' => function ($item) { return $item->user->name(); }],
                ['key' => 'E-Mail Address', 'value' => function ($item) { return $item->user->email; }],
                ['key' => 'Phone Number', 'value' => function ($item) { return $item->user->phone; }],
                ['key' => 'Country', 'value' => function ($item) { return '<span class="flag-icon flag-icon-' . strtolower($item->user->country) . '"></span> ' . $item->user->country; }],
                ['key' => 'Status', 'raw' => true, 'value' => function ($item) { return $item->user->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>'; }],
            ]
        ];
        return view('admin.admins.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Admin $request)
    {
        //
        $validated = $request->validated();
        return $validated;
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
