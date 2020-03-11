<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;

class CoursesController extends Controller
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

        $courses = Course::latest()->paginate($show);
        $all = Course::latest()->get();
        $data = [
            'links' => [
                'base' => 'admin.courses.',
                'index' => 'Courses list',
                'create' => 'Add a Course',
                'edit' => 'Edit a Course',
            ],
            'list' => $courses,
            'all' => $all,
            'table' => [
                ['key' => 'Teacher', 'value' => function ($item) { return $item->teacher->user->name(); }],
                ['key' => 'Title', 'value' => function ($item) { return ($item->title); }],
                ['key' => 'Description', 'value' => function ($item) { return Str::limit($item->description); }],
                ['key' => 'Price', 'value' => function ($item) { return $item->price; }],
                ['key' => 'Duration', 'value' => function ($item) { return $item->duration; }],
                ['key' => 'Language', 'value' => function ($item) { return $item->lang; }],
            ]
        ];
        return view('pages.admin.courses.index', compact('data'));
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
        $slug = Course::findOrFail($id)->slug;

        return redirect()
            ->route('courses.show', $slug);
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
        $course = Course::findOrFail($id);
        return view('pages.admin.courses.edit', compact('course'));
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
        $course = Course::findOrFail($id);
        $input = $request->all();

        if ($file = $request->file('photo')) {
            $photo = Photo::findOrFail($course->photo_id);
            unlink(public_path() . $photo->path);

            $fileName = time() . $file->getClientOriginalName();
            $file->move('images', $fileName);
            $photo->path = htmlspecialchars($fileName);

            $photo->save();
        }

        $input['course_content'] = json_encode($input['course_content']);
        $input['what_you_will_learn'] = json_encode($input['what_you_will_learn']);
        $input['requirements'] = json_encode($input['requirements']);
        $input['includes'] = json_encode($input['includes']);

        $course->update($input);

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'The course was successfully updated.');
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
