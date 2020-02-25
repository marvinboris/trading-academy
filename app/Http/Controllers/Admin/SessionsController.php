<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Session;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sessions = Session::get();
        $data = [
            'links' => [
                'base' => 'admin.sessions.',
                'index' => 'Sessions list',
                'create' => 'Add a Session',
                'edit' => 'Edit a Session',
            ],
            'list' => $sessions,
            'table' => [
                ['key' => 'Course', 'value' => function ($item) { return $item->course->title; }],
                ['key' => 'Start date', 'value' => function ($item) { return ($item->start); }],
                ['key' => 'End date', 'value' => function ($item) { return $item->end; }],
                ['key' => 'Places', 'value' => function ($item) { return $item->places; }],
            ]
        ];
        return view('admin.sessions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
