<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Author;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\NewTeamMember;
use App\Photo;
use Illuminate\Support\Facades\Hash;

class AuthorsController extends Controller
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

        $authors = Author::latest()->paginate($show);
        $all = Author::latest()->get();

        $data = [
            'links' => [
                'base' => 'admin.users.authors.',
                'index' => 'Authors list',
                'create' => 'Add an Author',
                'edit' => 'Edit an Author',
            ],
            'list' => $authors,
            'all' => $all,
            'table' => [
                ['key' => 'User ID', 'value' => function ($item) {
                    return $item->user->ref;
                }],
                ['key' => 'Name', 'value' => function ($item) {
                    return Str::limit($item->user->name());
                }],
                ['key' => 'E-Mail Address', 'value' => function ($item) {
                    return $item->user->email;
                }],
                ['key' => 'Phone Number', 'value' => function ($item) {
                    return $item->user->phone;
                }],
                ['key' => 'Country', 'value' => function ($item) {
                    return '<span class="flag-icon flag-icon-' . strtolower($item->user->country) . '"></span> ' . $item->user->country;
                }],
                ['key' => 'Status', 'raw' => true, 'value' => function ($item) {
                    return $item->user->is_active ? '<span class="badge badge-success badge-block"><i class="fas fa-check-circle mr-2"></i> Active</span>' : '<span class="badge badge-danger badge-block"><i class="fas fa-times-circle mr-2"></i> Inactive</span>';
                }],
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
        return view('pages.admin.users.authors.create');
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
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric'],
            'country_code' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'sponsor' => ['exists:users,ref', 'string', 'nullable'],
        ]);

        $input = $request->all();

        $userData = [
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'country' => $input['country_code'],
            'password' => Hash::make($input['password']),
            'phone' => $input['code'] . $input['phone'],
            'is_active' => $input['is_active'],
            'role_id' => 1,
            'sponsor' => $input['sponsor'] ?? User::first()->ref,
            'ref' => User::ref(),
            'email_verified_at' => time()
        ];

        if ($file = $request->file('photo')) {
            $fileName = time() . $file->getClientOriginalName();
            $file->move('images', $fileName);
            $photo = Photo::create(['path' => htmlspecialchars($fileName)]);
            $userData['photo_id'] = $photo->id;
        }

        $user = User::create($userData);

        $sponsor = User::where('ref', $user->sponsor)->first();
        Author::create(['user_id' => $user->id]);

        $sponsor->notify(new NewTeamMember($user));

        return redirect()
            ->route('admin.users.authors.index')
            ->with('success', 'Author successfully created');
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
        $author = Author::findOrFail($id);

        return view('pages.admin.users.authors.show', [
            'author' => $author
        ]);
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
        $author = Author::findOrFail($id);

        return view('pages.admin.users.authors.edit', [
            'author' => $author
        ]);
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
        $user = Author::findOrFail($id)->user;

        foreach (User::get() as $item) {
            if ($item->email === $request->email && $item->id !== $user->id) return redirect()
                ->back()
                ->with('danger', 'E-Mail already taken');
        }

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric'],
            'country_code' => ['required'],
        ]);

        $input = $request->all();

        $userData = [
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'country' => $input['country_code'],
            'phone' => $input['code'] . $input['phone'],
            'is_active' => $input['is_active'],
        ];

        if ($file = $request->file('photo')) {
            $fileName = time() . $file->getClientOriginalName();
            $file->move('images', $fileName);
            if ($user->photo) {
                unlink(public_path() . $user->photo->path);
                $user->photo->path = htmlspecialchars($fileName);
                $user->photo->save();
            } else {
                $photo = Photo::create(['path' => htmlspecialchars($fileName)]);
                $userData['photo_id'] = $photo->id;
            }
        }

        $user->update($userData);

        return redirect()
            ->route('admin.users.authors.index')
            ->with('success', 'Author successfully updated');
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
