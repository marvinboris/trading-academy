<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::get();
        $data = [
            'links' => [
                'base' => 'admin.students.',
                'index' => 'Students list',
                'create' => 'Add an Student',
                'edit' => 'Edit an Student',
            ],
            'list' => $students,
            'table' => [
                ['key' => 'User ID', 'value' => function ($item) { return $item->user->ref; }],
                ['key' => 'Name', 'value' => function ($item) { return $item->user->name(); }],
                ['key' => 'E-Mail Address', 'value' => function ($item) { return $item->user->email; }],
                ['key' => 'Phone Number', 'value' => function ($item) { return $item->user->phone; }],
                ['key' => 'Country', 'value' => function ($item) { return '<span class="flag-icon flag-icon-' . strtolower($item->user->country) . '"></span> ' . $item->user->country; }],
                ['key' => 'Status', 'raw' => true, 'value' => function ($item) { return $item->user->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>'; }],
            ]
        ];
        return view('admin.students.index', compact('data'));
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
