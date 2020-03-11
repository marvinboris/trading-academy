<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use App\Post;
use App\Course;
use App\Testimonial;
use App\Trainer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontEndController extends Controller
{
    //
    public function welcome()
    {
        $jsonString = file_get_contents(base_path('content.json'));
        $contentFile = json_decode($jsonString, true);
        $content = $contentFile['pages'][Session::get('lang')]['frontend']['pages']['home'];

        $coursesData = Course::get();
        $courses = [];

        $colors = [
            'bronze' => 'pink',
            'silver' => 'orange',
            'diamond' => 'blue',
        ];
        $iconColors = [
            'bronze' => 'scarlet',
            'silver' => 'scarlet',
            'diamond' => 'orange',
        ];
        $traderColors = [
            'bronze' => 'scarlet text-white',
            'silver' => 'orange text-white',
            'diamond' => 'blue text-white',
        ];
        $populars = [
            'bronze' => true,
            'silver' => false,
            'diamond' => false,
        ];

        foreach ($coursesData as $course) {
            $courseArray = $course->toArray();
            $courseArray['img'] = $course->photo->path;
            $courseArray['color'] = $colors[$course->slug];
            $courseArray['trader'] = [
                'level' => $course->title,
                'color' => $traderColors[$course->slug]
            ];
            $courseArray['reviews'] = [
                'mark' => $course->mark(),
                'voters' => count($course->views)
            ];
            $courseArray['popular'] = $populars[$course->slug];
            $courseArray['iconColor'] = $iconColors[$course->slug];
            $courseArray['link'] = route('courses.show', $course->slug);
            $courseArray['add'] = 'data-aos="fade-up" data-aos-anchor-placement="center-bottom"';
            $courses[] = $courseArray;
        }

        $postsData = Post::latest()->limit(3)->get();
        $posts = [];

        foreach ($postsData as $post) {
            $posts[] = [
                'title' => $post->title,
                'img' => $post->photo->path,
                'link' => route('posts.show', $post->slug),
                'date' => $post->updated_at->format('d-m-Y'),
                'body' => Str::limit($post->body),
                'add' => 'data-aos="zoom-in-up" data-aos-anchor-placement="center-bottom"'
            ];
        }

        $testimonials = Testimonial::get()->toArray();

        foreach ($testimonials as $testimonial) {
            $testimonial['add'] = 'data-aos="zoom-in" data-aos-anchor-placement="center-bottom"';
        }

        return view('pages.welcome', [
            'content' => $content,
            'courses' => $courses,
            'posts' => $posts,
            'testimonials' => $testimonials,
        ]);
    }

    public function blog()
    {
        $jsonString = file_get_contents(base_path('content.json'));
        $contentFile = json_decode($jsonString, true);
        $content = $contentFile['pages'][Session::get('lang')]['frontend']['pages']['blog'];

        $postsData = Post::latest()->limit(12)->get();
        $posts = [];
        foreach ($postsData as $post) {
            $posts[] = [
                'title' => $post->title,
                'img' => $post->photo->path,
                'link' => route('posts.show', $post->slug),
                'date' => $post->updated_at->format('d-m-Y'),
                'body' => Str::limit($post->body),
                'add' => 'data-aos="zoom-in-up" data-aos-anchor-placement="center-bottom"'
            ];
        }

        return view('pages.blog', [
            'content' => $content,
            'posts' => $posts
        ]);
    }

    public function about_us()
    {
        $jsonString = file_get_contents(base_path('content.json'));
        $contentFile = json_decode($jsonString, true);
        $content = $contentFile['pages'][Session::get('lang')]['frontend']['pages']['about'];

        $trainersData = Trainer::get()->toArray();

        return view('pages.about-us', [
            'content' => $content,
            'trainersData' => $trainersData
        ]);
    }

    public function contact()
    {
        $jsonString = file_get_contents(base_path('content.json'));
        $contentFile = json_decode($jsonString, true);
        $content = $contentFile['pages'][Session::get('lang')]['frontend']['pages']['contact'];

        return view('pages.contact', [
            'content' => $content
        ]);
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function course($level)
    {
        $jsonString = file_get_contents(base_path('content.json'));
        $contentFile = json_decode($jsonString, true);
        $content = $contentFile['pages'][Session::get('lang')]['frontend']['pages']['courses'];

        $colors = [
            'bronze' => 'pink',
            'silver' => 'orange',
            'diamond' => 'blue',
        ];
        $course = Course::where('slug', $level)->first();

        return view('pages.course', [
            'content' => $content,
            'course' => $course,
            'colors' => $colors
        ]);
    }

    public function post($slug)
    {
        $post = Post::whereSlug($slug)->first();

        return view('pages.post', [
            'post' => $post
        ]);
    }

    public function store($slug, Request $request)
    {
        $post = Post::whereSlug($slug)->first();

        $request->validate([
            'body' => 'required'
        ]);

        if ($request->comment_id) CommentReply::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'comment_id' => $request->comment_id
        ]);
        else Comment::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'post_id' => $post->id
        ]);

        if ($request->ajax()) {
            return view('post', [
                'post' => $post
            ]);
        }

        return redirect()
            ->route('posts.show', $slug);
    }
}
