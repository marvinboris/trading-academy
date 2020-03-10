<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Author;
use App\Notifications\NewTeamMember;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
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

        $teachers = Teacher::latest()->paginate($show);
        $all = Teacher::latest()->get();
        $data = [
            'links' => [
                'base' => 'admin.users.teachers.',
                'index' => 'Teachers list',
                'create' => 'Add a Teacher',
                'edit' => 'Edit a Teacher',
            ],
            'list' => $teachers,
            'all' => $all,
            'table' => [
                ['key' => 'User ID', 'value' => function ($item) { return $item->user->ref; }],
                ['key' => 'Name', 'value' => function ($item) { return $item->user->name(); }],
                ['key' => 'E-Mail Address', 'value' => function ($item) { return $item->user->email; }],
                ['key' => 'Phone Number', 'value' => function ($item) { return $item->user->phone; }],
                ['key' => 'Country', 'value' => function ($item) { return '<span class="flag-icon flag-icon-' . strtolower($item->user->country) . '"></span> ' . $item->user->country; }],
                ['key' => 'Status', 'raw' => true, 'value' => function ($item) { return $item->user->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>'; }],
            ]
        ];
        return view('pages.admin.users.teachers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.users.teachers.create');
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
            'role_id' => 2,
            'sponsor' => $input['sponsor'] ?? User::first()->ref,
            'ref' => User::ref()
        ];

        if ($file = $request->file('photo')) {
            $fileName = time() . $file->getClientOriginalName();
            $file->move('images', $fileName);
            $userData['photo'] = htmlspecialchars($fileName);
        }

        $user = User::create($userData);

        $user = User::find($user->id);
        $sponsor = User::where('ref', $user->sponsor)->first();
        Teacher::create(['user_id' => $user->id]);

        $sponsor->notify(new NewTeamMember($user));

        return redirect()
            ->route('admin.users.teachers.index')
            ->with('success', 'Teacher successfully created');
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
