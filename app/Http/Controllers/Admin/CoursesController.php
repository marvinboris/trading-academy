<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::get();
        $data = [
            'links' => [
                'base' => 'admin.courses.',
                'index' => 'Courses list',
                'create' => 'Add a Course',
                'edit' => 'Edit a Course',
            ],
            'list' => $courses,
            'table' => [
                ['key' => 'Teacher', 'value' => function ($item) { return $item->teacher->user->name(); }],
                ['key' => 'Title', 'value' => function ($item) { return ($item->title); }],
                ['key' => 'Description', 'value' => function ($item) { return Str::limit($item->description); }],
                ['key' => 'Price', 'value' => function ($item) { return $item->price; }],
                ['key' => 'Duration', 'value' => function ($item) { return $item->duration; }],
                ['key' => 'Language', 'value' => function ($item) { return $item->lang; }],
            ]
        ];
        return view('admin.courses.index', compact('data'));
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
