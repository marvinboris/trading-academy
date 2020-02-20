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

use Illuminate\Support\Facades\Session;

Auth::routes(['verify' => true]);

if (!Session::has('lang')) Session::put('lang', 'en');

Route::get('en', function () {
    Session::put('lang', 'en');
    return redirect()->back();
});

Route::get('fr', function () {
    Session::put('lang', 'fr');
    return redirect()->back();
});

Route::get('/', function () {
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
    $posts = [
        [
            'title' => 'First real estate token base project from Global Investment Trading',
            'img' => '/images/IronX-Crypto-exchange-Blog.jpg',
            'link' => '#',
            'date' => '16-01-2020'
        ],
        [
            'title' => 'Simbcoin world tour started in the capital city of cameroon (yde)',
            'img' => '/images/mycryptowallet-696x456.png',
            'link' => '#',
            'date' => '16-01-2020'
        ],
        [
            'title' => 'Global investment trading launched a new crypto currency (simbcoin)',
            'img' => '/images/shutterstock_1128653108-e1565938016868.jpg',
            'link' => '#',
            'date' => '16-01-2020'
        ]
    ];
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

Route::redirect('home', '/');

Route::name('blog')->get('blog', function () {
    $posts = [
        [
            'title' => 'First real estate token base project from Global Investment Trading',
            'img' => '/images/IronX-Crypto-exchange-Blog.jpg',
            'link' => '#',
            'date' => '16-01-2020'
        ],
        [
            'title' => 'Simbcoin world tour started in the capital city of cameroon (yde)',
            'img' => '/images/mycryptowallet-696x456.png',
            'link' => '#',
            'date' => '16-01-2020'
        ],
        [
            'title' => 'Global investment trading launched a new crypto currency (simbcoin)',
            'img' => '/images/shutterstock_1128653108-e1565938016868.jpg',
            'link' => '#',
            'date' => '16-01-2020'
        ]
    ];
    return view('blog', compact('posts'));
});

Route::name('courses.show')->get('courses/{course}', function ($level) {
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
            'link' => '/courses/bronze',
            'what-you-will-learn' => [
                'Professional risk management.',
                'To identify Support (demand) and Resistance (supply).',
                'Buying and selling actions of professionals.',
                'To understand and apply different order types.',
                'To build and manage a personalized Trading Plan.',
                'To recognize technical chart patterns and monitoring trends.',
                'To use Fibonacci studies.'
            ],
            'course-content' => [
                [
                    'title' => 'Introduction',
                    'subcontent' => [
                        'What is online Trading ?',
                        'Basics',
                        'History of Trading',
                        'Crypto Trading'
                    ]
                ],
                [
                    'title' => 'Introduction',
                    'subcontent' => [
                        'What is online Trading ?',
                        'Basics',
                        'History of Trading',
                        'Crypto Trading'
                    ]
                ],
                [
                    'title' => 'Introduction',
                    'subcontent' => [
                        'What is online Trading ?',
                        'Basics',
                        'History of Trading',
                        'Crypto Trading'
                    ]
                ],
                [
                    'title' => 'Introduction',
                    'subcontent' => [
                        'What is online Trading ?',
                        'Basics',
                        'History of Trading',
                        'Crypto Trading'
                    ]
                ]
            ],
            'comments' => [
                [
                    'author' => [
                        'abbr' => 'JD',
                        'name' => 'John Doe'
                    ],
                    'mark' => 4,
                    'text' => 'This course is so interesting that I followed it twice.',
                    'date' => '2019-02-07'
                ],
                [
                    'author' => [
                        'abbr' => 'JD',
                        'name' => 'John Doe'
                    ],
                    'mark' => 4,
                    'text' => 'This course is so interesting that I followed it twice.',
                    'date' => '2019-02-07'
                ],
                [
                    'author' => [
                        'abbr' => 'JD',
                        'name' => 'John Doe'
                    ],
                    'mark' => 4,
                    'text' => 'This course is so interesting that I followed it twice.',
                    'date' => '2019-02-07'
                ],
                [
                    'author' => [
                        'abbr' => 'JD',
                        'name' => 'John Doe'
                    ],
                    'mark' => 4,
                    'text' => 'This course is so interesting that I followed it twice.',
                    'date' => '2019-02-07'
                ],
                [
                    'author' => [
                        'abbr' => 'JD',
                        'name' => 'John Doe'
                    ],
                    'mark' => 4,
                    'text' => 'This course is so interesting that I followed it twice.',
                    'date' => '2019-02-07'
                ]
            ]
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
            'link' => '/courses/silver',
            'what-you-will-learn' => [
                'Professional risk management.',
                'To identify Support (demand) and Resistance (supply).',
                'Buying and selling actions of professionals.',
                'To understand and apply different order types.',
                'To build and manage a personalized Trading Plan.',
                'To recognize technical chart patterns and monitoring trends.',
                'To use Fibonacci studies.'
            ],
            'course-content' => [
                [
                    'title' => 'Introduction',
                    'subcontent' => [
                        'What is online Trading ?',
                        'Basics',
                        'History of Trading',
                        'Crypto Trading'
                    ]
                ],
                [
                    'title' => 'Introduction',
                    'subcontent' => [
                        'What is online Trading ?',
                        'Basics',
                        'History of Trading',
                        'Crypto Trading'
                    ]
                ],
                [
                    'title' => 'Introduction',
                    'subcontent' => [
                        'What is online Trading ?',
                        'Basics',
                        'History of Trading',
                        'Crypto Trading'
                    ]
                ],
                [
                    'title' => 'Introduction',
                    'subcontent' => [
                        'What is online Trading ?',
                        'Basics',
                        'History of Trading',
                        'Crypto Trading'
                    ]
                ]
            ],
            'comments' => [
                [
                    'author' => [
                        'abbr' => 'JD',
                        'name' => 'John Doe'
                    ],
                    'mark' => 4,
                    'text' => 'This course is so interesting that I followed it twice.',
                    'date' => '2019-02-07'
                ],
                [
                    'author' => [
                        'abbr' => 'JD',
                        'name' => 'John Doe'
                    ],
                    'mark' => 4,
                    'text' => 'This course is so interesting that I followed it twice.',
                    'date' => '2019-02-07'
                ],
                [
                    'author' => [
                        'abbr' => 'JD',
                        'name' => 'John Doe'
                    ],
                    'mark' => 4,
                    'text' => 'This course is so interesting that I followed it twice.',
                    'date' => '2019-02-07'
                ],
                [
                    'author' => [
                        'abbr' => 'JD',
                        'name' => 'John Doe'
                    ],
                    'mark' => 4,
                    'text' => 'This course is so interesting that I followed it twice.',
                    'date' => '2019-02-07'
                ],
                [
                    'author' => [
                        'abbr' => 'JD',
                        'name' => 'John Doe'
                    ],
                    'mark' => 4,
                    'text' => 'This course is so interesting that I followed it twice.',
                    'date' => '2019-02-07'
                ]
            ]
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
            'link' => '/courses/diamond',
            'what-you-will-learn' => [
                'Professional risk management.',
                'To identify Support (demand) and Resistance (supply).',
                'Buying and selling actions of professionals.',
                'To understand and apply different order types.',
                'To build and manage a personalized Trading Plan.',
                'To recognize technical chart patterns and monitoring trends.',
                'To use Fibonacci studies.'
            ],
            'course-content' => [
                [
                    'title' => 'Introduction',
                    'subcontent' => [
                        'What is online Trading ?',
                        'Basics',
                        'History of Trading',
                        'Crypto Trading'
                    ]
                ],
                [
                    'title' => 'Introduction',
                    'subcontent' => [
                        'What is online Trading ?',
                        'Basics',
                        'History of Trading',
                        'Crypto Trading'
                    ]
                ],
                [
                    'title' => 'Introduction',
                    'subcontent' => [
                        'What is online Trading ?',
                        'Basics',
                        'History of Trading',
                        'Crypto Trading'
                    ]
                ],
                [
                    'title' => 'Introduction',
                    'subcontent' => [
                        'What is online Trading ?',
                        'Basics',
                        'History of Trading',
                        'Crypto Trading'
                    ]
                ]
            ],
            'comments' => [
                [
                    'author' => [
                        'abbr' => 'JD',
                        'name' => 'John Doe'
                    ],
                    'mark' => 4,
                    'text' => 'This course is so interesting that I followed it twice.',
                    'date' => '2019-02-07'
                ],
                [
                    'author' => [
                        'abbr' => 'JD',
                        'name' => 'John Doe'
                    ],
                    'mark' => 4,
                    'text' => 'This course is so interesting that I followed it twice.',
                    'date' => '2019-02-07'
                ],
                [
                    'author' => [
                        'abbr' => 'JD',
                        'name' => 'John Doe'
                    ],
                    'mark' => 4,
                    'text' => 'This course is so interesting that I followed it twice.',
                    'date' => '2019-02-07'
                ],
                [
                    'author' => [
                        'abbr' => 'JD',
                        'name' => 'John Doe'
                    ],
                    'mark' => 4,
                    'text' => 'This course is so interesting that I followed it twice.',
                    'date' => '2019-02-07'
                ],
                [
                    'author' => [
                        'abbr' => 'JD',
                        'name' => 'John Doe'
                    ],
                    'mark' => 4,
                    'text' => 'This course is so interesting that I followed it twice.',
                    'date' => '2019-02-07'
                ]
            ]
        ]
    ];
    $ranks = ['bronze' => 0, 'silver' => 1, 'diamond' => 2];
    $course = $courses[$ranks[$level]];
    return view('course', compact('course'));
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

Route::get('countries', function () {
    return Countries::getList('en', 'json');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::namespace('Admin')->name('admin.')->middleware('admin')->prefix('admin')->group(function () {
        Route::name('dashboard')->get('dashboard', 'DashboardController@index');
        Route::resource('admins', 'AdminsController');
        Route::resource('authors', 'AuthorsController');
        Route::resource('channels', 'ChannelsController');
        Route::resource('comments/replies', 'CommentRepliesController');
        Route::resource('comments', 'CommentsController');
        Route::resource('courses/documents', 'DocumentsController');
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
        });
    });
});
