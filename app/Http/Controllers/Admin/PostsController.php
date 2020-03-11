<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
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

        $posts = Post::latest()->paginate($show);
        $all = Post::latest()->get();

        $data = [
            'links' => [
                'base' => 'author.posts.',
                'index' => 'My Posts',
                'create' => 'Add Post',
                'edit' => 'Edit Post',
            ],
            'list' => $posts,
            'all' => $all,
            'table' => [
                ['key' => 'Title', 'value' => function ($item) { return $item->title; }],
                ['key' => 'Body', 'value' => function ($item) { return Str::limit($item->body); }],
                ['key' => 'Slug', 'value' => function ($item) { return $item->slug; }],
                ['key' => 'Created at', 'value' => function ($item) { return $item->created_at->diffForHumans(); }],
                ['key' => 'Updated at', 'value' => function ($item) { return $item->updated_at->diffForHumans(); }]
            ]
        ];
        
        if ($request->ajax()) {
            return view('table', [
                'list' => $data['list'], 
                'links' => $data['links'], 
                'all' => $data['all'], 
                'table' => $data['table']
            ])->render();
        }

        return view('pages.admin.posts.index', compact('data'));
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
