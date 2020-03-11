<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
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

        $admins = Admin::latest()->paginate($show);
        $all = Admin::latest()->get();

        $data = [
            'links' => [
                'base' => 'admin.users.admins.',
                'index' => 'Admins list',
                'create' => 'Add an Admin',
                'edit' => 'Edit an Admin',
            ],
            'list' => $admins,
            'all' => $all,
            'table' => [
                ['key' => 'Name', 'value' => function ($item) {
                    return $item->name;
                }],
                ['key' => 'E-Mail Address', 'value' => function ($item) {
                    return $item->email;
                }],
                ['key' => 'Phone Number', 'value' => function ($item) {
                    return $item->phone;
                }],
                ['key' => 'Country', 'value' => function ($item) {
                    return '<span class="flag-icon flag-icon-' . strtolower($item->country) . '"></span> ' . $item->country;
                }],
                ['key' => 'Status', 'raw' => true, 'value' => function ($item) {
                    return $item->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
                }],
            ]
        ];
        return view('pages.admin.users.admins.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.users.admins.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'phone' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $input = $request->all();

        $adminData = [
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'],
            'is_active' => $input['is_active'],
        ];

        Admin::create($adminData);

        return redirect()
            ->route('admin.users.admins.index')
            ->with('success', 'Admin created successfully');
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
        $admin = Admin::findOrFail($id);

        return view('pages.admin.users.admins.edit', [
            'admin' => $admin
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
        $admin = Admin::findOrFail($id);

        foreach (Admin::get() as $item) {
            if ($item->email === $request->email && $item->id !== $admin->id) return redirect()
                ->back()
                ->with('danger', 'E-Mail already taken');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric'],
        ]);

        $input = $request->all();

        $adminData = [
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'is_active' => $input['is_active'],
        ];

        $admin->update($adminData);

        return redirect()
            ->route('admin.users.admins.index')
            ->with('success', 'Admin updated successfully');
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
