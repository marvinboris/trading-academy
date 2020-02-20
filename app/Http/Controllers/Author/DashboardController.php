<?php

namespace App\Http\Controllers\Author;

use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'author']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $team = Auth::user()->referrals();
        $posts = Author::where('user_id', Auth::user()->id)->first()->posts;
        $teamTable = [
            'list' => $team,
            'table' => [
                ['key' => 'User ID', 'value' => function ($item) { return $item->ref; }],
                ['key' => 'Name', 'value' => function ($item) { return $item->name(); }],
                ['key' => 'Phone Number', 'value' => function ($item) { return $item->phone; }],
                // ['key' => 'E-Mail Address', 'value' => function ($item) { return $item->email; }],
            ],
            'headBgColor' => 'green',
            'bodyBgColor' => 'light',
        ];
        $postsTable = [
            'list' => $posts,
            'table' => [
                ['key' => 'Title', 'value' => function ($item) { return $item->title; }],
                ['key' => 'Body', 'value' => function ($item) { return Str::limit($item->body); }],
                // ['key' => 'Comments', 'value' => function ($item) { return count($item->comments); }],
            ],
            'headBgColor' => 'green',
            'bodyBgColor' => 'light',
        ];
        return view('user.author.dashboard', compact('team', 'posts', 'teamTable', 'postsTable'));
    }
}
