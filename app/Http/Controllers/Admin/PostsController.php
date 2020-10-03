<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\Session;
use App\Photo;

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
                'base' => 'admin.posts.',
                'index' => 'Posts List',
                'create' => 'Add Post',
                'edit' => 'Edit Post',
            ],
            'list' => $posts,
            'all' => $all,
            'table' => [
                ['key' => 'Title', 'value' => function ($item) {
                    return $item->title;
                }],
                ['key' => 'Body', 'value' => function ($item) {
                    return Str::limit($item->body);
                }],
                ['key' => 'Slug', 'value' => function ($item) {
                    return $item->slug;
                }],
                ['key' => 'Created at', 'value' => function ($item) {
                    return $item->created_at->diffForHumans();
                }],
                ['key' => 'Updated at', 'value' => function ($item) {
                    return $item->updated_at->diffForHumans();
                }]
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
        $data = [
            'links' => [
                'base' => 'admin.posts.',
                'index' => 'Posts List',
                'create' => 'Add Post',
                'edit' => 'Edit Post',
            ],
            'action' => route('admin.posts.store'),
            'method' => 'post',
            'file' => true,
            'size' => 'lg-9',
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

        return view('pages.admin.posts.create', [
            'data' => $data
        ]);
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
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $fileName = time() . $file->getClientOriginalName();
            $file->move('images', $fileName);
            $input['photo'] = htmlspecialchars($fileName);
        }
        $photo = Photo::create(['path' => $input['photo']]);
        $input['photo_id'] = $photo->id;
        $post = Post::create($input);
        Author::first()->posts()->save($post);
        $request->session()->flash('success', 'The post ' . $post->title . ' has been successfully added.');
        return redirect()
            ->route('admin.posts.index');
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
        $post = Post::find($id);
        $data = [
            'links' => [
                'base' => 'admin.posts.',
                'index' => 'Posts List',
                'create' => 'Add Post',
                'edit' => 'Edit Post',
            ],
            'data' => $post,
            'action' => route('admin.posts.update', $id),
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
                        'hidden' => true,
                        'size' => '3'
                    ]
                ]
            ]
        ];
        return view('pages.admin.posts.edit', compact('data'));
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
        $post = Post::find($id);
        $photo = $post->photo;
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $path = public_path() . '/images/' . $photo->path;
            if (file_exists($path)) unlink($path);
            $fileName = time() . $file->getClientOriginalName();
            $file->move('images', $fileName);
            $photo->update(['path' => htmlspecialchars($fileName)]);
        }
        $post->update($input);
        $request->session()->flash('updated_post', 'The post ' . $post->title . ' has been successfully updated.');
        return redirect()
            ->route('admin.posts.index');
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
