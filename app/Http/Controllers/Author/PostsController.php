<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Author\Post as PostRequest;
use App\Http\Requests\Teacher\Session;
use App\Photo;

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
            'links' => [
                'base' => 'author.posts.',
                'index' => 'My Posts',
                'create' => 'Add Post',
                'edit' => 'Edit Post',
            ],
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
            'links' => [
                'base' => 'author.posts.',
                'index' => 'My Posts',
                'create' => 'Add Post',
                'edit' => 'Edit Post',
            ],
            'action' => route('author.posts.store'),
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
        return view('user.author.posts.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        $input = $request->validated();
        if ($file = $request->file('photo')) {
            $fileName = time() . $file->getClientOriginalName();
            $file->move('images', $fileName);
            $input['photo'] = htmlspecialchars($fileName);
        }
        $photo = Photo::create(['path' => $input['photo']]);
        $input['photo_id'] = $photo->id;
        $post = Post::create($input);
        Author::find(Auth::id())->posts()->save($post);
        Session::flash('created_post', 'The post ' . $post->title . ' has been successfully added.');
        return redirect(route('user.author.posts.index'));
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
        $post = Author::where('user_id', Auth::id())->first()->posts()->find($id);
        $data = [
            'links' => [
                'base' => 'author.posts.',
                'index' => 'My Posts',
                'create' => 'Add Post',
                'edit' => 'Edit Post',
            ],
            'data' => $post,
            'action' => route('author.posts.update', $id),
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
                        'value' => $post->title,
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
                        'value' => $post->body,
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
        return view('user.author.posts.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        //
        $post = Author::where('user_id', Auth::id())->first()->posts()->find($id);
        $photo = $post->photo;
        $input = $request->validated();
        if ($file = $request->file('photo')) {
            $path = public_path() . '/images/' . $photo->path;
            if (file_exists($path)) unlink($path);
            $fileName = time() . $file->getClientOriginalName();
            $file->move('images', $fileName);
            $photo->update(['path' => htmlspecialchars($fileName)]);
        }
        $post->save($input);
        Session::flash('updated_post', 'The post ' . $post->title . ' has been successfully updated.');
        return redirect(route('user.author.posts.index'));
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
