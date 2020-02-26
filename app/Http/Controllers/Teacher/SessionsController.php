<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $sessions = Teacher::where('user_id', Auth::user()->id)->first()->sessions;
        $data = [
            'links' => [
                'base' => 'teacher.sessions.',
                'index' => 'My Sessions',
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
        return view('user.teacher.sessions.index', compact('data'));
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
