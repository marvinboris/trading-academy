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

use App\Post;
use App\User;
use App\Course;
use App\Language;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

Auth::routes();

Route::namespace('Admin')->name('admin.')->prefix('admin')->group(function () {
    Route::redirect('/', url('admin/login'));

    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        //Login Routes
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');

        Route::get('verify', 'LoginController@getVerify')->name('verify');
        Route::post('verify', 'LoginController@verify');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        Route::name('users.')->prefix('users')->group(function () {
            Route::resource('admins', 'AdminsController');
            Route::resource('authors', 'AuthorsController');
            Route::resource('students', 'StudentsController');
            Route::resource('teachers', 'TeachersController');
        });

        Route::name('media.')->prefix('media')->group(function () {
            Route::resource('photos', 'PhotosController');
            Route::resource('documents', 'DocumentsController');
        });

        Route::name('about-user.')->prefix('about-user')->group(function () {
            Route::name('verifications.cancelled')->get('verifications/cancelled', 'VerifyController@cancelled');
            Route::name('verifications.approved')->get('verifications/approved', 'VerifyController@approved');
            Route::name('verifications.get')->get('verifications/pending', 'VerifyController@get');
            Route::name('verifications.show')->get('verifications/{verification}', 'VerifyController@show');
            Route::name('verifications.post')->post('verifications/{verification}', 'VerifyController@post');

            Route::name('commissions')->get('commissions', 'CommissionsController@get');
        });

        Route::resource('channels', 'ChannelsController');
        Route::resource('comments/replies', 'CommentRepliesController');
        Route::resource('comments', 'CommentsController');
        Route::resource('courses', 'CoursesController');
        Route::resource('deposits', 'DepositsController');
        Route::resource('messages', 'MessagesController');
        Route::resource('posts', 'PostsController');
        Route::resource('roles', 'RolesController');
        Route::resource('sessions', 'SessionsController');
        Route::resource('views', 'ViewsController');
    });
});

if (!Session::has('lang')) {
    if (Auth::check()) Session::put('lang', Auth::user()->lang);
    else Session::put('lang', 'en');
}

Route::get('lang/{lang}', function ($lang) {
    Session::put('lang', $lang);
    return redirect()
        ->back();
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

    return redirect()
        ->route('login');
});

Route::middleware('logout_on_verification')->get('/', function () {
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
        $courseArray['class'] = 'bounceInUp to-animate';
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

Route::namespace('Method')->group(function () {
    Route::post('/cryptobox/callback', 'CryptoboxController@callback');
    Route::get('/cryptobox/callback', 'CryptoboxController@callback');
});

Route::middleware(['auth', 'verification'])->group(function () {
    Route::get('dashboard', function () {
        return redirect(route(strtolower(Auth::user()->role->name) . '.dashboard'));
    });

    Route::namespace('Method')->group(function () {
        Route::name('user.finance.deposits.cryptobox.post')->post('user/finance/deposits/cryptobox', 'CryptoboxController@index');
        Route::name('user.finance.deposits.cryptobox.get')->get('user/finance/deposits/cryptobox', 'CryptoboxController@index');

        Route::name('monetbil.notify.post')->post('monetbil/notify', 'MonetbilController@notify');
        Route::name('monetbil.notify.get')->get('monetbil/notify', 'MonetbilController@notify');
    });

    Route::name('user.')->prefix('user')->group(function () {
        Route::name('team')->get('team', 'TeamController@index');
        Route::name('messages')->get('messages', 'MessagesController@index');
        Route::name('notifications.show')->get('notifications/details/{id}', 'NotificationsController@show');
        Route::name('notifications')->get('notifications', 'NotificationsController@index');
        Route::name('finance.')->namespace('Finance')->prefix('finance')->group(function () {
            Route::post('transfers/confirm', 'TransfersController@confirm')->name('transfers.confirm');
            Route::resource('transfers', 'TransfersController');

            Route::resource('deposits', 'DepositsController');

            Route::resource('withdraws', 'WithdrawsController');
        });
        Route::name('settings.')->prefix('settings')->namespace('Settings')->group(function () {
            Route::post('change-password', 'ChangePasswordController@post')->name('change-password.post');
            Route::get('change-password', 'ChangePasswordController@get')->name('change-password.get');

            Route::post('verification', 'VerificationController@post')->name('verification.post');
            Route::get('verification', 'VerificationController@get')->name('verification.get');

            Route::post('edit-language', 'EditLanguageController@post')->name('edit-language.post');
            Route::get('edit-language', 'EditLanguageController@get')->name('edit-language.get');
        });
    });

    Route::namespace('Author')->name('author.')->middleware('author')->prefix('author')->group(function () {
        Route::name('dashboard')->get('dashboard', 'DashboardController@index');
        Route::resource('posts', 'PostsController');
    });

    Route::middleware('participant')->group(function () {
        Route::namespace('Student')->name('student.')->middleware('student')->prefix('student')->group(function () {
            Route::name('dashboard')->get('dashboard', 'DashboardController@index');
            Route::name('courses.')->prefix('courses')->group(function () {
                Route::name('index')->get('', 'CoursesController@index');
                Route::name('mine')->get('mine', 'CoursesController@mine');
                Route::name('show')->get('mine/{course}', 'CoursesController@show');
                Route::name('enroll')->get('{course}/enroll', 'CoursesController@enroll');
                Route::name('confirm')->get('{course}/enroll/{session}/confirm', 'CoursesController@confirm');
                Route::name('confirmed')->post('confirmed', 'CoursesController@confirmed');
            });
        });

        Route::namespace('Teacher')->name('teacher.')->middleware('teacher')->prefix('teacher')->group(function () {
            Route::name('dashboard')->get('dashboard', 'DashboardController@index');
            Route::resource('courses', 'CoursesController');
            Route::resource('messages', 'MessagesController');
            Route::resource('sessions', 'SessionsController');
            Route::resource('documents', 'DocumentsController');
        });
    });
});
