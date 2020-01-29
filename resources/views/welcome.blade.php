@extends('layouts.app')

@section('content')
<div class="position-relative" style="height: calc(100vh - 95px);">
    <div class="position-absolute h-100 w-100">
        <div id="carousel" class="carousel slide carousel-fade h-100" data-ride="carousel" data-interval="3000">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="carousel-indicator active"></li>
                <li data-target="#carousel" data-slide-to="1" class="carousel-indicator"></li>
                <li data-target="#carousel" data-slide-to="2" class="carousel-indicator"></li>
            </ol>
            <div class="carousel-inner h-100 position-relative">
                <div id="banner" class="w-75">
                    <div class="d-flex justify-content-center w-75">
                        <div class="bg-white rounded-circle shadow position-relative circle white" style="height: 100px; width: 100px;">
                            <div class="position-absolute bg-yellow rounded-circle shadow circle yellow" style="width: 62px; height: 62px; bottom: -12px; right: -22px; z-index: 10;"></div>
                        </div>
                    </div>
                    <div class="font-family-comfortaa text-green h1 title">
                        Welcome to
                    </div>  
                    <div class="d-flex justify-content-start align-items-start mb-5">
                        <div class="pt-2">
                            <div class="d-flex bg-yellow position-relative justify-content-center align-items-center" style="width: 12px; height: 100px; border-radius: 7px;">
                                <div class="bg-green rounded-circle position-absolute d-flex justify-content-center align-items-center circle green" style="width: 32px; height: 32px;">
                                    <div class="bg-white rounded-circle" style="width: 18px; height: 18px;"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="font-family-baloo text-white pl-4 display-4 content">
                                The best African Crypto <br>
                                Trading School
                            </div>
                            <div class="lead text-white font-family-comfortaa pl-4 subcontent">
                                Get started with to learn the best crypto trading<br>Techniques and be the best
                            </div>
                        </div>
                    </div>
                    <div class="pl-5">
                        <a href="#" class="btn btn-green btn-lg font-family-montserrat font-weight-bold link" style="border-radius: 32px;">
                            <span>Sign Up</span>
                            <i class="fas fa-arrow-alt-circle-right ml-4"></i>
                        </a>
                    </div>
                </div>
                <div class="carousel-item h-100 active">
                    <div class="pt-5 h-100" style="background-image: linear-gradient(rgba(0, 0, 0, .45), rgba(0, 0, 0, .45)), url('/images/wp2054297.jpg'); background-size: cover; background-position: center;"></div>
                </div>

                <div class="carousel-item h-100">
                    <div class="pt-5 h-100" style="background-image: linear-gradient(rgba(0, 0, 0, .45), rgba(0, 0, 0, .45)), url('/images/DX-margin-trade-crypto.jpg'); background-size: cover; background-position: center;"></div>
                </div>

                <div class="carousel-item h-100">
                    <div class="pt-5 h-100" style="background-image: linear-gradient(rgba(0, 0, 0, .45), rgba(0, 0, 0, .45)), url('/images/3commas-cover.jpg'); background-size: cover; background-position: center;"></div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="fas fa-arrow-alt-circle-left fa-4x text-yellow" aria-hidden="true"></span>
                {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="fas fa-arrow-alt-circle-right fa-4x text-yellow" aria-hidden="true"></span>
                {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<div class="container-fluid p-5 bg-light">
    <div class="px-5">
        <div class="row">
            <div class="col-md-4">
                <div class="position-relative rounded-lg shadow-sm bg-yellow text-dark p-4" style="padding-top: 170px !important;">
                    <div class="position-absolute rounded-circle shadow bg-white d-flex justify-content-center align-items-center" style="width: 200px; height: 200px; top: 0; left: 50%; transform: translate(-50%, calc(-50% + 70px));">
                        <i class="fas fa-5x fa-star-half-alt text-center text-dark"></i>
                    </div>
                    <div class="h1 text-center">Indoor games</div>
                    <div class="text-justify">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta nihil velit quisquam, sequi corporis rerum, atque nesciunt qui libero aut odio beatae iure! Earum molestiae doloremque dolorem architecto facere aspernatur.
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="position-relative rounded-lg shadow-sm bg-darkblue text-white p-4" style="padding-top: 170px !important;">
                    <div class="position-absolute rounded-circle shadow bg-white d-flex justify-content-center align-items-center" style="width: 200px; height: 200px; top: 0; left: 50%; transform: translate(-50%, calc(-50% + 70px));">
                        <i class="fas fa-5x fa-poll-h text-center text-dark"></i>
                    </div>
                    <div class="h1 text-center">Indoor games</div>
                    <div class="text-justify">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta nihil velit quisquam, sequi corporis rerum, atque nesciunt qui libero aut odio beatae iure! Earum molestiae doloremque dolorem architecto facere aspernatur.
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="position-relative rounded-lg shadow-sm bg-green text-white p-4" style="padding-top: 170px !important;">
                    <div class="position-absolute rounded-circle shadow bg-white d-flex justify-content-center align-items-center" style="width: 200px; height: 200px; top: 0; left: 50%; transform: translate(-50%, calc(-50% + 70px));">
                        <i class="fab fa-5x fa-squarespace text-center text-dark"></i>
                    </div>
                    <div class="h1 text-center">Indoor games</div>
                    <div class="text-justify">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta nihil velit quisquam, sequi corporis rerum, atque nesciunt qui libero aut odio beatae iure! Earum molestiae doloremque dolorem architecto facere aspernatur.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-header text-light">
    <div class="p-5 text-center">
        <div class="row">
            <div class="col-lg-3 d-flex justify-content-center align-items-center">
                <div class="pr-3">
                    <i class="fas fa-book-open fa-5x"></i>
                </div>
                <div>
                <h2 class="display-4">3</h2>
                <p class="text-uppercase lead">Courses</p>
                </div>
            </div>
            <div class="col-lg-3 d-flex justify-content-center align-items-center">
                <div class="pr-3">
                    <i class="fas fa-users fa-5x"></i>
                </div>
                <div>
                <h2 class="display-4">200</h2>
                <p class="text-uppercase lead">Learners</p>
                </div>
            </div>
            <div class="col-lg-3 d-flex justify-content-center align-items-center">
                <div class="pr-3">
                    <i class="fas fa-user-graduate fa-5x"></i>
                </div>
                <div>
                <h2 class="display-4">500</h2>
                <p class="text-uppercase lead">Graduates</p>
                </div>
            </div>
            <div class="col-lg-3 d-flex justify-content-center align-items-center">
                <div class="pr-3">
                    <i class="fas fa-user-tie fa-5x"></i>
                </div>
                <div>
                <h2 class="display-4">10</h2>
                <p class="text-uppercase lead">Trainers</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid p-5 bg-white">
    <div class="px-5">
        <div class="text-center">
            <h1 class="text-dark font-family-baloo pb-2 mb-3 d-inline-block position-relative">
                Level courses
                <div class="position-absolute bg-dark w-100 d-flex justify-content-center align-items-center" style="bottom: 0; height: 1px;">
                    <div class="bg-white w-25 h-100 d-flex justify-content-center align-items-center">
                        <div class="rounded-circle bg-dark" style="width: 12px; height: 12px;"></div>
                    </div>
                </div>
            </h1>
        </div>
        <p class="lead text-center">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been  the industry's standard dummy text ever since the 1500s, 
        </p>

        <div class="row align-items-center">
            @php
                $coursesData = [
                    [
                        'color' => 'orange',
                        'position' => 5,
                        'popular' => true,
                        'img' => '/images/104098929_w640_h640_prodam-too-2007.jpg',
                        'price' => 230,
                        'level' => 'Beginner',
                        'duration' => 148,
                        'reviews' => [
                            'mark' => 4.5,
                            'voters' => 103
                        ],
                        'certificate' => true
                    ],
                    [
                        'color' => 'red',
                        'position' => 20,
                        'popular' => false,
                        'img' => '/images/forex-brokers.jpg',
                        'price' => 230,
                        'level' => 'Intermediate',
                        'duration' => 148,
                        'reviews' => [
                            'mark' => 4.5,
                            'voters' => 103
                        ],
                        'certificate' => true
                    ],
                    [
                        'color' => 'darkblue',
                        'position' => 35,
                        'popular' => false,
                        'img' => '/images/1267555.jpg',
                        'price' => 230,
                        'level' => 'Expert',
                        'duration' => 148,
                        'reviews' => [
                            'mark' => 4.5,
                            'voters' => 103
                        ],
                        'certificate' => true
                    ]
                ];
            @endphp
            @component('components.course', $coursesData[0])
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil excepturi qui voluptate, quod labore
            @endcomponent
            @component('components.course', $coursesData[1])
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil excepturi qui voluptate, quod labore
            @endcomponent
            @component('components.course', $coursesData[2])
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil excepturi qui voluptate, quod labore
            @endcomponent
        </div>
    </div>
</div>

<div class="container-fluid p-5 bg-light text-dark">
    <div class="text-center">
        <h1 class="text-dark font-family-baloo pb-2 mb-3 d-inline-block position-relative">
            Testimonials
            <div class="position-absolute bg-dark w-100 d-flex justify-content-center align-items-center" style="bottom: 0; height: 1px;">
                <div class="bg-light w-25 h-100 d-flex justify-content-center align-items-center">
                    <div class="rounded-circle bg-dark" style="width: 12px; height: 12px;"></div>
                </div>
            </div>
        </h1>
    </div>
    <p class="lead text-center">
        What people say about Trading Academy
    </p>

    <div class="row pt-4 px-5">
        @php
            $testimonialsData = [
                [
                    'name' => 'John Doe',
                    'img' => '/images/11-6.jpg',
                    'title' => 'Proprietary of Shane Branding LTD',
                    'links' => [
                        'facebook' => '#',
                        'twitter' => '#',
                        'linkedin' => '#',
                        'instagram' => '#',
                        'skype' => '#'
                    ]
                ],
                [
                    'name' => 'Alvino Jaris',
                    'img' => '/images/Michael-Jordans-Short-Haircut-1-1.jpg',
                    'title' => 'CEO of Alvino & Sons SARL',
                    'links' => [
                        'facebook' => '#',
                        'twitter' => '#',
                        'linkedin' => '#',
                        'instagram' => '#',
                        'skype' => '#'
                    ]
                ],
                [
                    'name' => 'Calvin Baristo',
                    'img' => '/images/800x590-curtis-jackson-1920x1080.jpg',
                    'title' => 'Crypto Investor',
                    'links' => [
                        'facebook' => '#',
                        'twitter' => '#',
                        'linkedin' => '#',
                        'instagram' => '#',
                        'skype' => '#'
                    ]
                ]
            ];
        @endphp
        @component('components.testimonial', $testimonialsData[0])
        @endcomponent
        @component('components.testimonial', $testimonialsData[1])
        @endcomponent
        @component('components.testimonial', $testimonialsData[2])
        @endcomponent
        <div class="col-12">
            <div class="d-flex justify-content-end pt-4">
                <a href="#" class="d-flex align-items-center text-dark">
                    <div class="font-weight-bold pr-2">View full list</div>
                    <div>
                        <div class="d-flex bg-dark position-relative justify-content-center align-items-center" style="width: 1px; height: 40px; border-radius: 5px;">
                        </div>
                    </div>
                    <div class="pl-2">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid p-5 bg-white">
    <div class="text-center">
        <h1 class="text-dark font-family-baloo pb-2 mb-3 d-inline-block position-relative">
            Recent posts
            <div class="position-absolute bg-dark w-100 d-flex justify-content-center align-items-center" style="bottom: 0; height: 1px;">
                <div class="bg-light w-25 h-100 d-flex justify-content-center align-items-center">
                    <div class="rounded-circle bg-dark" style="width: 12px; height: 12px;"></div>
                </div>
            </div>
        </h1>
    </div>
    <div class="row pt-4 px-5">
        @php
            $postsData = [
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
        @endphp
        @component('components.post', $postsData[0])
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum culpa minus quod
        @endcomponent
        @component('components.post', $postsData[1])
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum culpa minus quod
        @endcomponent
        @component('components.post', $postsData[2])
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum culpa minus quod
        @endcomponent
        <div class="col-12">
            <div class="d-flex justify-content-end pt-4">
                <a href="#" class="d-flex align-items-center text-darkblue">
                    <div class="font-weight-bold pr-2">View full list</div>
                    <div>
                        <div class="d-flex bg-darkblue position-relative justify-content-center align-items-center" style="width: 1px; height: 40px; border-radius: 5px;">
                        </div>
                    </div>
                    <div class="pl-2">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(function () {
            const data = [
                {
                    title: 'Welcome to',
                    content: 'The best African Crypto <br>Trading School',
                    subcontent: 'Get started with to learn the best crypto trading<br>Techniques and be the best',
                    green: { top: 20 },
                    link: { text: 'Sign Up', href: '#' },
                    white: { top: 0, left: 0 },
                    yellow: { bottom: -12, right: -22 }
                },
                {
                    title: 'Learn More',
                    content: 'We offer the best Crypto <br>Trading courses',
                    subcontent: 'Want to know more ?',
                    green: { top: 40 },
                    link: { text: 'Read more', href: '#' },
                    white: { top: 0, left: -20 },
                    yellow: { bottom: 12, right: 60 }
                },
                {
                    title: 'Get the best',
                    content: 'Crypto Trading<br>courses here',
                    subcontent: 'Get started with to learn the best crypto trading<br>Techniques and be the best',
                    green: { top: 0 },
                    link: { text: 'Sign Up', href: '#' },
                    white: { top: -20, left: 20 },
                    yellow: { bottom: 24, right: 10 }
                }
            ];
            $('#carousel').on('slide.bs.carousel', function () {
                setTimeout(() => {
                    const index = +$('.carousel-indicator.active').attr('data-slide-to');
                    const { title, content, subcontent, green, link, white, yellow } = data[index];

                    $('#banner .title').html(title);
                    $('#banner .content').html(content);
                    $('#banner .subcontent').html(subcontent);
                    $('#banner .link span').html(link.text);
                    $('#banner .link').attr('href', link.href);
                    $('#banner .circle.green').animate(green);
                    $('#banner .circle.white').animate(white);
                    $('#banner .circle.yellow').animate(yellow);
                }, 1);
            });
        });
    </script>
@endsection