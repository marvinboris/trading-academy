<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $courses = Teacher::where('user_id', Auth::user()->id)->first()->courses;
        $data = [
            'links' => [
                'base' => 'teacher.courses.',
                'index' => 'My Courses',
                'create' => 'Add a Course',
                'edit' => 'Edit a Course',
            ],
            'list' => $courses,
            'table' => [
                ['key' => 'Title', 'value' => function ($item) { return ($item->title); }],
                ['key' => 'Subtitle', 'value' => function ($item) { return Str::limit($item->subtitle); }],
                ['key' => 'Price', 'value' => function ($item) { return $item->price; }],
                ['key' => 'Duration', 'value' => function ($item) { return $item->duration; }],
                ['key' => 'Language', 'value' => function ($item) { return $item->lang; }],
            ]
        ];
        return view('user.teacher.courses.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.teacher.courses.create');
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
        $course = Teacher::where('user_id', Auth::user()->id)->first()->courses()->findOrFail($id);
        return view('user.teacher.courses.edit', compact('course'));
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
        $course = Teacher::where('user_id', Auth::user()->id)->first()->courses()->findOrFail($id);
        $input = $request->all();
        return $input['course_content'];
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
