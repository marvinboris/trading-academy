<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentsController extends Controller
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

        $documents = Document::latest()->paginate($show);
        $all = Document::latest()->get();
        $data = [
            'links' => [
                'base' => 'admin.media.documents.',
                'index' => 'Documents list',
                'create' => 'Add a Document',
                'edit' => 'Edit a Document',
            ],
            'list' => $documents,
            'all' => $all,
            'table' => [
                ['key' => 'Name', 'value' => function ($item) {
                    return ($item->name);
                }],
                ['key' => 'Path', 'value' => function ($item) {
                    return $item->path;
                }],
            ]
        ];
        return view('pages.admin.media.documents.index', compact('data'));
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
                'base' => 'admin.media.documents.',
                'index' => 'My Documents',
                'create' => 'Add Document',
                'edit' => 'Edit Document',
            ],
            'action' => route('admin.media.documents.store'),
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

        return view('pages.admin.media.documents.create', compact('data'));
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

        return redirect()
            ->route('admin.media.documents.index')
            ->with('success', 'The document ' . $document->name . ' has been successfully added.');
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
                'base' => 'admin.media.documents.',
                'index' => 'My Documents',
                'create' => 'Add Document',
                'edit' => 'Edit Document',
            ],
            'action' => route('admin.media.documents.update', $document->id),
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

        return view('pages.admin.media.documents.edit', compact('data'));
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

        return redirect()
            ->route('admin.media.documents.index')
            ->with('success', 'The document ' . $document->name . ' has been successfully updated.');
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
