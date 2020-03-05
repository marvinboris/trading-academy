<?php

namespace App\Http\Controllers;

use App\Post;
use App\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function welcome()
    {
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
                'link' => '#',
                'date' => $post->updated_at->format('d-m-Y'),
                'body' => Str::limit($post->body),
                'add' => 'data-aos="zoom-in-up" data-aos-anchor-placement="center-bottom"'
            ];
        }
        $testimonials = [
            [
                'name' => 'John Doe',
                'img' => '/images/11-6.jpg',
                'title' => 'Proprietary of Shane Branding LTD',
                'postTitle' => 'The Best Crypto Trading Academy school',
                'links' => [
                    'facebook' => '#',
                    'twitter' => '#',
                    'linkedin' => '#',
                    'instagram' => '#',
                    'skype' => '#'
                ],
                'add' => 'data-aos="zoom-in" data-aos-anchor-placement="center-bottom"',
                'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no'
            ],
            [
                'name' => 'Alvino Jaris',
                'img' => '/images/Michael-Jordans-Short-Haircut-1-1.jpg',
                'title' => 'CEO of Alvino & Sons SARL',
                'postTitle' => 'The Best Crypto Trading Academy school',
                'links' => [
                    'facebook' => '#',
                    'twitter' => '#',
                    'linkedin' => '#',
                    'instagram' => '#',
                    'skype' => '#'
                ],
                'add' => 'data-aos="zoom-in" data-aos-anchor-placement="center-bottom"',
                'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no'
            ],
            [
                'name' => 'Calvin Baristo',
                'img' => '/images/800x590-curtis-jackson-1920x1080.jpg',
                'title' => 'Crypto Investor',
                'postTitle' => 'The Best Crypto Trading Academy school',
                'links' => [
                    'facebook' => '#',
                    'twitter' => '#',
                    'linkedin' => '#',
                    'instagram' => '#',
                    'skype' => '#'
                ],
                'add' => 'data-aos="zoom-in" data-aos-anchor-placement="center-bottom"',
                'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no'
            ]
        ];
        return view('welcome', [
            'courses' => $courses,
            'posts' => $posts,
            'testimonials' => $testimonials,
        ]);
    }

    public function blog()
    {
        $postsData = Post::latest()->limit(12)->get();
        $posts = [];
        foreach ($postsData as $post) {
            $posts[] = [
                'title' => $post->title,
                'img' => $post->photo->path,
                'link' => '#',
                'date' => $post->updated_at->format('d-m-Y'),
                'body' => Str::limit($post->body),
                'add' => 'data-aos="zoom-in-up" data-aos-anchor-placement="center-bottom"'
            ];
        }

        return view('blog', [
            'posts' => $posts
        ]);
    }

    public function about_us()
    {
        $trainersData = [
            [
                'img' => '/images/11-6.jpg',
                'name' => 'SIMB Emile Parfait',
                'resume' => 'CEO, Crypto trader, and founder of Global Investment Trading',
                'links' => [
                    'facebook' => '#',
                    'twitter' => '#',
                    'instagram' => '#',
                    'whatsapp' => '#'
                ]
            ],
            [
                'img' => '/images/800x590-curtis-jackson-1920x1080.jpg',
                'name' => 'YUNGONG Briand',
                'resume' => 'Head of IT Department of Global Investment Trading',
                'links' => [
                    'facebook' => '#',
                    'twitter' => '#',
                    'instagram' => '#',
                    'whatsapp' => '#'
                ]
            ],
            [
                'img' => '/images/Michael-Jordans-Short-Haircut-1-1.jpg',
                'name' => 'PANGSOU Innocent',
                'resume' => 'Head of Trading Department of Global Investment Trading',
                'links' => [
                    'facebook' => '#',
                    'twitter' => '#',
                    'instagram' => '#',
                    'whatsapp' => '#'
                ]
            ],
            [
                'img' => '/images/Folarin_photo_credit_Valerie_Woody.5d3b2983c9977.jpg',
                'name' => 'KOUMBOU Jeffe',
                'resume' => 'General Director of Global Investment Trading',
                'links' => [
                    'facebook' => '#',
                    'twitter' => '#',
                    'instagram' => '#',
                    'whatsapp' => '#'
                ]
            ],
            [
                'img' => '/images/e68111de892892fc25b3e72c1ee6a4f6.jpg',
                'name' => 'MEFIRE Souleymane',
                'resume' => 'Head of Logistics Department of Global Investment Trading',
                'links' => [
                    'facebook' => '#',
                    'twitter' => '#',
                    'instagram' => '#',
                    'whatsapp' => '#'
                ]
            ]
        ];

        return view('about-us', [
            'trainersData' => $trainersData
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function faq()
    {
        return view('faq');
    }

    public function course($level)
    {
        $colors = [
            'bronze' => 'pink',
            'silver' => 'orange',
            'diamond' => 'blue',
        ];
        $course = Course::where('slug', $level)->first();

        return view('course', [
            'course' => $course,
            'colors' => $colors
        ]);
    }
}
