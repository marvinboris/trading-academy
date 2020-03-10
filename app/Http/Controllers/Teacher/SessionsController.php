<?php

namespace App\Http\Controllers\Teacher;

use App\Course;
use App\Http\Controllers\Controller;
use App\Session;
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
    public function index(Request $request)
    {
        //
        $show = $request->show ?? 10;

        $sessions = Teacher::where('user_id', Auth::id())->first()->sessions()->latest()->paginate($show);
        $all = Teacher::where('user_id', Auth::id())->first()->sessions()->latest()->get();

        $data = [
            'links' => [
                'base' => 'teacher.sessions.',
                'index' => 'My Sessions',
                'create' => 'Add Session',
                'edit' => 'Edit Session',
            ],
            'list' => $sessions,
            'all' => $all,
            'table' => [
                ['key' => 'Course', 'value' => function ($item) {
                    return $item->course->title;
                }],
                ['key' => 'Start date', 'value' => function ($item) {
                    return ($item->start->format('D, d M Y'));
                }],
                ['key' => 'End date', 'value' => function ($item) {
                    return $item->end->format('D, d M Y');
                }],
                ['key' => 'Places', 'value' => function ($item) {
                    return $item->places;
                }],
            ]
        ];
        return view('pages.user.teacher.sessions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courses = Course::get();
        $data = [
            'links' => [
                'base' => 'teacher.sessions.',
                'index' => 'My Sessions',
                'create' => 'Add Session',
                'edit' => 'Edit Session',
            ],
            'action' => route('teacher.sessions.store'),
            'method' => 'post',
            'file' => false,
            'size' => '9',
            'content' => [
                [
                    'type' => 'select',
                    'size' => '12',
                    'data' => [
                        'name' => 'course_id',
                        'label' => 'Course',
                        'required' => 'required',
                        'placeholder' => 'Select a Course',
                        'size' => '3',
                        'data' => [
                            'list' => $courses,
                            'value' => function ($item) {
                                return $item->id;
                            },
                            'label' => function ($item) {
                                return $item->title;
                            },
                        ]
                    ]
                ],
                [
                    'type' => 'date',
                    'size' => '12',
                    'data' => [
                        'name' => 'start',
                        'label' => 'Starts on',
                        'type' => 'date',
                        'required' => 'required',
                        'placeholder' => '&#xf1dc;   Start',
                        'size' => '3'
                    ]
                ],
                [
                    'type' => 'date',
                    'size' => '12',
                    'data' => [
                        'name' => 'end',
                        'label' => 'Ends on',
                        'type' => 'date',
                        'required' => 'required',
                        'placeholder' => '&#xf1dc;   End',
                        'size' => '3'
                    ]
                ],
                [
                    'type' => 'number',
                    'size' => '12',
                    'data' => [
                        'name' => 'places',
                        'label' => 'Available places',
                        'type' => 'number',
                        'required' => 'required',
                        'placeholder' => '&#xf1dc;   Places',
                        'size' => '3'
                    ]
                ],
            ]
        ];
        return view('pages.user.teacher.sessions.create', compact('data'));
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
        $input = $request->validate([
            'course_id' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date',
            'places' => 'required|numeric',
        ]);
        $session = Session::create($input);
        Course::findOrFail($input['course_id'])->sessions()->save($session);
        Teacher::where('user_id', Auth::id())->first()->sessions()->save($session);
        $request->session()->flash('success', 'The session has been successfully added.');
        return redirect(route('teacher.sessions.index'));
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
        $session = Session::findOrFail($id);
        $courses = Course::get();
        $data = [
            'links' => [
                'base' => 'teacher.sessions.',
                'index' => 'My Sessions',
                'create' => 'Add Session',
                'edit' => 'Edit Session',
            ],
            'action' => route('teacher.sessions.update', $id),
            'method' => 'post',
            'file' => false,
            'size' => '9',
            'content' => [
                [
                    'type' => 'select',
                    'size' => '12',
                    'data' => [
                        'name' => 'course_id',
                        'label' => 'Course',
                        'required' => 'required',
                        'value' =>  $session->course_id,
                        'placeholder' => 'Select a Course',
                        'size' => '3',
                        'data' => [
                            'list' => $courses,
                            'value' => function ($item) {
                                return $item->id;
                            },
                            'label' => function ($item) {
                                return $item->title;
                            },
                        ]
                    ]
                ],
                [
                    'type' => 'date',
                    'size' => '12',
                    'data' => [
                        'name' => 'start',
                        'label' => 'Starts on',
                        'type' => 'date',
                        'required' => 'required',
                        'value' =>  $session->start->format('Y-m-d'),
                        'placeholder' => '&#xf1dc;   Start',
                        'size' => '3'
                    ]
                ],
                [
                    'type' => 'date',
                    'size' => '12',
                    'data' => [
                        'name' => 'end',
                        'label' => 'Ends on',
                        'type' => 'date',
                        'required' => 'required',
                        'value' =>  $session->end->format('Y-m-d'),
                        'placeholder' => '&#xf1dc;   End',
                        'size' => '3'
                    ]
                ],
                [
                    'type' => 'number',
                    'size' => '12',
                    'data' => [
                        'name' => 'places',
                        'label' => 'Available places',
                        'type' => 'number',
                        'required' => 'required',
                        'value' =>  $session->places,
                        'placeholder' => '&#xf1dc;   Places',
                        'size' => '3'
                    ]
                ],
            ]
        ];
        return view('pages.user.teacher.sessions.edit', compact('data'));
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
        $session = Session::findOrFail($id);
        $input = $request->validate([
            'course_id' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date',
            'places' => 'required|numeric',
        ]);
        $session->update($input);
        $request->session()->flash('success', 'The session has been successfully updated.');
        return redirect(route('teacher.sessions.index'));
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
