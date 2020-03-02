<?php

namespace App\Http\Controllers\Teacher;

use App\Course;
use App\Teacher;
use App\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Teacher::where('user_id', Auth::id())->first()->courses;
        $documents = [];
        $documentsId = [];

        foreach ($courses as $course) {
            foreach ($course->documents as $document) {
                if (!in_array($document->id, $documentsId)) {
                    $documentsId[] = $document->id;
                    $documents[] = $document;
                }
            }
        }

        $data = [
            'links' => [
                'base' => 'teacher.documents.',
                'index' => 'My Documents',
                'create' => 'Add a Document',
                'edit' => 'Edit a Document',
            ],
            'list' => $documents,
            'table' => [
                ['key' => 'Name', 'value' => function ($item) { return ($item->name); }],
                ['key' => 'Path', 'value' => function ($item) { return ($item->path); }],
            ]
        ];

        return view('user.teacher.documents.index', compact('data'));
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
                'base' => 'teacher.documents.',
                'index' => 'My Documents',
                'create' => 'Add Document',
                'edit' => 'Edit Document',
            ],
            'action' => route('teacher.documents.store'),
            'method' => 'post',
            'file' => true,
            'size' => '9',
            'content' => [
                [
                    'type' => 'checkbox',
                    'size' => '12',
                    'data' => [
                        'name' => 'course_id',
                        'label' => 'Select Courses',
                        'required' => 'required',
                        'size' => '3',
                        'list' => $courses,
                        'id' => 'id',
                        'unit_name' => 'title'
                    ]
                ],
                [
                    'type' => 'text',
                    'size' => '12',
                    'data' => [
                        'name' => 'name',
                        'label' => 'Name',
                        'type' => 'text',
                        'required' => 'required',
                        'placeholder' => '&#xf1dc;   Name',
                        'size' => '3'
                    ]
                ],
                [
                    'type' => 'file',
                    'size' => '12',
                    'data' => [
                        'name' => 'path',
                        'label' => 'Path',
                        'required' => 'required',
                        'placeholder' => '&#xf1dc;   Path',
                        'size' => '3'
                    ]
                ],
            ]
        ];

        return view('user.teacher.documents.create', compact('data'));
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
            'path' => 'required|file',
            'name' => 'required|string',
        ]);
        if ($file = $request->file('path')) {
            $fileName = time() . $file->getClientOriginalName();
            $file->move('documents', $fileName);
            $input['path'] = htmlspecialchars($fileName);
        }
        $document = Document::create($input);
        $document->courses()->sync($request->course_id);
        $request->session()->flash('success', 'The document ' . $document->name . ' has been successfully added.');
        return redirect()
            ->route('teacher.documents.index');
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
        $document = Document::findOrFail($id);
        $courses = Course::get();
        $data = [
            'links' => [
                'base' => 'teacher.documents.',
                'index' => 'My Documents',
                'create' => 'Add Document',
                'edit' => 'Edit Document',
            ],
            'action' => route('teacher.documents.update', $document->id),
            'method' => 'post',
            'file' => true,
            'size' => '9',
            'content' => [
                [
                    'type' => 'checkbox',
                    'size' => '12',
                    'data' => [
                        'name' => 'course_id',
                        'label' => 'Select Courses',
                        'required' => 'required',
                        'size' => '3',
                        'list' => $courses,
                        'id' => 'id',
                        'unit_name' => 'title',
                        'checkedList' => $document->courses
                    ]
                ],
                [
                    'type' => 'text',
                    'size' => '12',
                    'data' => [
                        'name' => 'name',
                        'label' => 'Name',
                        'type' => 'text',
                        'required' => 'required',
                        'placeholder' => '&#xf1dc;   Name',
                        'size' => '3',
                        'value' => $document->name
                    ]
                ],
                [
                    'type' => 'file',
                    'size' => '12',
                    'data' => [
                        'name' => 'path',
                        'label' => 'Path',
                        'type' => 'file',
                        'placeholder' => '&#xf1dc;   Path',
                        'size' => '3',
                    ]
                ],
            ]
        ];

        return view('user.teacher.documents.edit', compact('data'));
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
        $document = Document::findOrFail($id);
        $input = $request->validate([
            'path' => 'nullable|file',
            'name' => 'required|string',
        ]);
        return $input;
        if ($file = $request->file('path')) {
            $path = public_path() . $document->path;
            if (file_exists($path)) unlink($path);
            $fileName = time() . $file->getClientOriginalName();
            $file->move('documents', $fileName);
            $input['path'] = htmlspecialchars($fileName);
        }
        $document->update($input);
        $document->courses()->sync($request->course_id);
        $request->session()->flash('success', 'The document ' . $document->name . ' has been successfully updated.');
        return redirect()
            ->route('teacher.documents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //
        $document = Document::findOrFail($id);
        $document->delete();
        $path = public_path() . '/documents/' . $document->path;
        if (file_exists($path)) unlink($path);
        $request->session()->flash('success', 'The document ' . $document->name . ' has been successfully deleted.');
        return redirect()
            ->route('teacher.documents.index');
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function multiDelete(Request $request)
    {
        $checkboxes = $request->checkboxArray;
        $documents = array();
        foreach ($checkboxes as $id) {
            $documents[+$id] = Document::findOrFail(+$id);
            $documents[+$id]->delete();
            $path = public_path() . '/documents/' . $documents[+$id]->path;
            if (file_exists($path)) unlink($path);
            else unlink(public_path() . '../www/documents/' . $documents[+$id]->path);
        }
        $request->session()->flash('success', $documents);
        return redirect()
            ->route('teacher.documents.index');
    }
}
