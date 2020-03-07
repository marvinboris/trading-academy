<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $authors = Author::get();
        $data = [
            'links' => [
                'base' => 'admin.users.authors.',
                'index' => 'Authors list',
                'create' => 'Add an Author',
                'edit' => 'Edit an Author',
            ],
            'list' => $authors,
            'table' => [
                ['key' => 'User ID', 'value' => function ($item) { return $item->user->ref; }],
                ['key' => 'Name', 'value' => function ($item) { return Str::limit($item->user->name()); }],
                ['key' => 'E-Mail Address', 'value' => function ($item) { return $item->user->email; }],
                ['key' => 'Phone Number', 'value' => function ($item) { return $item->user->phone; }],
                ['key' => 'Country', 'value' => function ($item) { return '<span class="flag-icon flag-icon-' . strtolower($item->user->country) . '"></span> ' . $item->user->country; }],
                ['key' => 'Status', 'raw' => true, 'value' => function ($item) { return $item->user->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>'; }],
            ]
        ];
        return view('pages.admin.users.authors.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'links' => [
                'base' => 'admin.users.authors.',
                'index' => 'Authors list',
                'create' => 'Add an Author',
                'edit' => 'Edit an Author',
            ],
            'action' => route('admin.users.authors.store'),
            'method' => 'post',
            'file' => true,
            'size' => '9',
            'content' => [
                [
                    'type' => 'text',
                    'size' => '12',
                    'data' => [
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => 'required',
                        'placeholder' => '&#xf1dc;   Title',
                        'size' => '3'
                    ]
                ],
                [
                    'type' => 'text',
                    'size' => '12',
                    'data' => [
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => 'required',
                        'placeholder' => '&#xf1dc;   Title',
                        'size' => '3'
                    ]
                ],
                [
                    'type' => 'text',
                    'size' => '12',
                    'data' => [
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => 'required',
                        'placeholder' => '&#xf1dc;   Title',
                        'size' => '3'
                    ]
                ],
                [
                    'type' => 'text',
                    'size' => '12',
                    'data' => [
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => 'required',
                        'placeholder' => '&#xf1dc;   Title',
                        'size' => '3'
                    ]
                ],
                [
                    'type' => 'textarea',
                    'size' => '12',
                    'data' => [
                        'name' => 'body',
                        'label' => 'Body',
                        'required' => 'required',
                        'placeholder' => '&#xf1dd;   Body',
                        'size' => '3'
                    ]
                ],
                [
                    'type' => 'file',
                    'size' => '12',
                    'data' => [
                        'name' => 'photo',
                        'label' => 'Photo',
                        'required' => 'required',
                        'hidden' => true,
                        'size' => '3'
                    ]
                ]
            ]
        ];
        return view('pages.admin.users.authors.create', compact('data'));
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
