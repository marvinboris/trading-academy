<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Course;
use App\Post;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

Auth::routes();

Route::name('admin.login')->get('admin', 'Auth\AdminController@getLogin');
Route::name('admin.verify')->get('admin/verify', 'Auth\AdminController@getVerify');
Route::post('admin', 'Auth\AdminController@login');
Route::post('admin/verify', 'Auth\AdminController@verify');

if (!Session::has('lang')) Session::put('lang', 'en');

Route::get('en', function () {
    Session::put('lang', 'en');
    return redirect()->back();
});

Route::get('fr', function () {
    Session::put('lang', 'fr');
    return redirect()->back();
});

Route::get('email/verify/{id}/{code}', function ($id, $code) {
    $user = User::findOrFail($id);
    if ($user->email_verified_at) {
        Request::session()->flash('already_verified', 'Account already activated. Please login.');
    } else {
        $string = $user->toJson();
        if ($string === Crypt::decryptString($code)) {
            $time = json_decode($string)->created_at;
            $now = time();
            if ($now - strtotime($time) < 24 * 60 * 60) {
                $user->email_verified_at = $now;
                Request::session()->flash('activated', 'Account activation successful.');
                $user->save();
            } else Request::session()->flash('not_verified', 'Your activation link has expired. Please, contact the administrator.');
        } else Request::session()->flash('not_verified', 'Your activation link is incorrect. Please, contact the administrator.');
    }

    return redirect(route('login'));
});

Route::middleware('logout_on_verification')->get('/', function () {
    $courses = [
        [
            'color' => 'pink',
            'iconColor' => 'scarlet',
            'position' => 5,
            'popular' => true,
            'trader' => ['level' => 'Bronze', 'color' => 'transparent'],
            'img' => '/images/104098929_w640_h640_prodam-too-2007.jpg',
            'price' => 230,
            'level' => 'Getting Started with Crypto Currency Trading',
            'duration' => 148,
            'reviews' => [
                'mark' => 4.5,
                'voters' => 103
            ],
            'certificate' => true,
            'link' => '/courses/bronze'
        ],
        [
            'color' => 'orange',
            'iconColor' => 'scarlet',
            'position' => 20,
            'popular' => false,
            'trader' => ['level' => 'Silver', 'color' => 'transparent'],
            'img' => '/images/forex-brokers.jpg',
            'price' => 230,
            'level' => 'Getting Started with Crypto Currency Trading',
            'duration' => 148,
            'reviews' => [
                'mark' => 4.5,
                'voters' => 103
            ],
            'certificate' => true,
            'link' => '/courses/silver'
        ],
        [
            'color' => 'blue',
            'iconColor' => 'orange',
            'position' => 35,
            'popular' => false,
            'trader' => ['level' => 'Diamond', 'color' => 'orange'],
            'img' => '/images/1267555.jpg',
            'price' => 230,
            'level' => 'Getting Started with Crypto Currency Trading',
            'duration' => 148,
            'reviews' => [
                'mark' => 4.5,
                'voters' => 103
            ],
            'certificate' => true,
            'link' => '/courses/diamond'
        ]
    ];
    $postsData = Post::latest()->limit(3)->get();
    $posts = [];
    foreach ($postsData as $post) {
        $posts[] = [
            'title' => $post->title,
            'img' => $post->photo->path,
            'link' => '#',
            'date' => $post->updated_at->format('d-m-Y'),
            'body' => Str::limit($post->body)
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
            'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no'
        ]
    ];
    return view('welcome', compact('courses', 'posts', 'testimonials'));
});

Route::redirect('home', url('/'));

Route::name('blog')->get('blog', function () {
    $postsData = Post::latest()->limit(12)->get();
    $posts = [];
    foreach ($postsData as $post) {
        $posts[] = [
            'title' => $post->title,
            'img' => $post->photo->path,
            'link' => '#',
            'date' => $post->updated_at->format('d-m-Y'),
            'body' => Str::limit($post->body)
        ];
    }
    return view('blog', compact('posts'));
});

Route::name('courses.show')->get('courses/{course}', function ($level) {
    $colors = [
        'bronze' => 'pink',
        'silver' => 'orange',
        'diamond' => 'blue',
    ];
    $course = Course::where('slug', $level)->first();
    return view('course', compact('course', 'colors'));
});

Route::name('about-us')->get('about-us', function () {
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
    return view('about-us', compact('trainersData'));
});

Route::name('contact')->get('contact', function () {
    return view('contact');
});

Route::middleware(['auth', 'verification'])->group(function () {
    Route::get('dashboard', function () {
        return redirect(route(strtolower(Auth::user()->role->name) . '.dashboard'));
    });

    Route::namespace('Admin')->name('admin.')->middleware('admin')->prefix('admin')->group(function () {
        Route::name('dashboard')->get('dashboard', 'DashboardController@index');
        Route::resource('admins', 'AdminsController');
        Route::resource('authors', 'AuthorsController');
        Route::resource('channels', 'ChannelsController');
        Route::resource('comments/replies', 'CommentRepliesController');
        Route::resource('comments', 'CommentsController');
        Route::resource('documents', 'DocumentsController');
        Route::resource('courses', 'CoursesController');
        Route::resource('messages', 'MessagesController');
        Route::resource('photos', 'PhotosController');
        Route::resource('posts', 'PostsController');
        Route::resource('roles', 'RolesController');
        Route::resource('sessions', 'SessionsController');
        Route::resource('students', 'StudentsController');
        Route::resource('teachers', 'TeachersController');
        Route::resource('views', 'ViewsController');
    });

    Route::name('user.')->prefix('user')->group(function () {
        Route::name('team')->get('team', 'TeamController@index');
        Route::name('messages')->get('messages', 'MessagesController@index');
        Route::name('notifications.show')->get('notifications/details/{id}', 'NotificationsController@show');
        Route::name('notifications')->get('notifications', 'NotificationsController@index');
    });


    Route::namespace('Author')->name('author.')->middleware('author')->prefix('author')->group(function () {
        Route::name('dashboard')->get('dashboard', 'DashboardController@index');
        Route::resource('posts', 'PostsController');
    });

    Route::middleware('participant')->group(function () {
        Route::namespace('Student')->name('student.')->middleware('student')->prefix('student')->group(function () {
            Route::name('dashboard')->get('dashboard', 'DashboardController@index');
        });

        Route::namespace('Teacher')->name('teacher.')->middleware('teacher')->prefix('teacher')->group(function () {
            Route::name('dashboard')->get('dashboard', 'DashboardController@index');
            Route::resource('courses', 'CoursesController');
            Route::resource('messages', 'MessagesController');
            Route::resource('sessions', 'SessionsController');
        });
    });
});
