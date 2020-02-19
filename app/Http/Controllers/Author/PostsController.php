<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Author::where('user_id', Auth::user()->id)->first()->posts;
        $data = [
            'index' => ['name' => 'My Posts', 'link' => route('author.posts.index')],
            'create' => ['name' => 'Add Post', 'link' => route('author.posts.create')],
            'list' => $posts,
            'table' => [
                ['key' => 'Title', 'value' => function ($item) { return $item->title; }],
                ['key' => 'Body', 'value' => function ($item) { return Str::limit($item->body); }],
                ['key' => 'Slug', 'value' => function ($item) { return $item->slug; }],
                ['key' => 'Created at', 'value' => function ($item) { return $item->created_at->diffForHumans(); }],
                ['key' => 'Updated at', 'value' => function ($item) { return $item->updated_at->diffForHumans(); }]
            ]
        ];
        return view('user.author.posts.index', compact('data'));
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
            'index' => ['name' => 'My Posts', 'link' => route('author.posts.index')],
            'create' => ['name' => 'Add Post', 'link' => route('author.posts.create')],
            'action' => route('author.posts.store'),
            'method' => 'post',
            'file' => true,
            'size' => 8,
            'content' => [
                [
                    'type' => 'text',
                    'size' => 12,
                    'data' => [
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => 'required',
                        'size' => 4
                    ]
                ],
                [
                    'type' => 'text',
                    'size' => 12,
                    'data' => [
                        'name' => 'body',
                        'label' => 'Body',
                        'type' => 'textarea',
                        'required' => 'required',
                        'size' => 4
                    ]
                ]
            ]
        ];
        return view('user.author.posts.create', compact('data'));
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
