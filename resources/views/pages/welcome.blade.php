@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <meta name="msvalidate.01" content="BF7990362D0510206E7C65506F247C25" />
    <meta name="description" content="Faites passer votre trading au niveau supérieur avec nos cours de formation gratuits. Convient aux traders novices et avancés pour se perfectionner au trading grace à nos meilleurs cours au cameroun et dans le monde." />
@endsection

@section('content')
<section class="home">
    <div class="position-relative full-height-app">
        <div class="position-absolute h-100 w-100">
            <div id="carousel" class="carousel slide carousel-fade h-100" data-ride="carousel" data-interval="2000">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="carousel-indicator active"></li>
                    <li data-target="#carousel" data-slide-to="1" class="carousel-indicator"></li>
                    <li data-target="#carousel" data-slide-to="2" class="carousel-indicator"></li>
                    <div class="bg-transparent circle-carousel-indicator rounded-circle border border-3 border-yellow position-absolute d-none" style="width: 26px; height: 26px; transform: translate(-14px, -2px);"></div>
                </ol>
                <div class="carousel-inner h-100 position-relative d-flex align-items-center">
                    <div id="banner" class="w-75 mx-auto text-center text-sm-left">
                        <div class=" text-orange text-montserrat h1 title">
                            {!! $content['slider']['content'][0]['first'] !!}
                        </div>
                        <div class="my-5">
                            <div>
                                <div class="w-sm-75 mb-4">
                                    <div class="d-none">
                                        <div class="bullet-1 rounded-circle bg-orange shadow position-absolute" style="width: 100px; height: 100px; top: -20px; right: 20px;"></div>
                                        <div class="bullet-2 rounded-circle bg-light shadow position-absolute" style="width: 57px; height: 57px; top: 60px; right: -20px;"></div>
                                        <div class="bullet-3 rounded-circle bg-green shadow position-absolute" style="width: 62px; height: 62px; top: 20px; right: -10px;"></div>
                                    </div>

                                    <div class="text-allexist text-white content d-sm-none" style="font-size: 2.5rem;">{!! $content['slider']['content'][0]['second'] !!}</div>
                                    <div class="text-allexist text-white display-4 d-none d-sm-block content pb-4 pl-4">{!! $content['slider']['content'][0]['second'] !!}</div>
                                
                                </div>
                                <div class="lead text-white subcontent">
                                    {!! $content['slider']['content'][0]['third'] !!}
                                </div>
                            </div>
                        </div>
                        @guest
                        <div>
                            <a class="nav-link btn-group btn-animate" style="left: 0;" href="{{ route('register') }}">
                                <div class="btn btn-lg btn-green primary pd-x-0 overflow-hidden rounded-sm static link text-allexist position-relative">
                                    <span class="d-block pd-x-3 text-x-large py-1">{{ __($content['slider']['sign_up']) }}</span>
                                    <div class="bg-darkblue secondary align-items-center d-none active rounded-sm-right px-3 py-2 position-absolute h-100" style="top: 0; right: 0;">
                                        <i class="fas fa-lg fa-arrow-alt-circle-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endguest

                    </div>
                    <div class="carousel-item h-100 active">
                        <div class="pt-5 h-100" style="background-image: linear-gradient(rgba(0, 0, 0, .45), rgba(0, 0, 0, .45)), url('{{ asset($content['slider']['content'][0]['img']) }}'); background-size: cover; background-position: center;"></div>
                    </div>

                    <div class="carousel-item h-100">
                        <div class="pt-5 h-100" style="background-image: linear-gradient(rgba(0, 0, 0, .45), rgba(0, 0, 0, .45)), url('{{ asset($content['slider']['content'][1]['img']) }}'); background-size: cover; background-position: center;"></div>
                    </div>

                    <div class="carousel-item h-100">
                        <div class="pt-5 h-100" style="background-image: linear-gradient(rgba(0, 0, 0, .45), rgba(0, 0, 0, .45)), url('{{ asset($content['slider']['content'][2]['img']) }}'); background-size: cover; background-position: center;"></div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="fas fa-arrow-alt-circle-left fa-3x text-white" aria-hidden="true"></span>
                    {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="fas fa-arrow-alt-circle-right fa-3x text-white" aria-hidden="true"></span>
                    {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid px-md-5 px-4 py-5 bg-light position-relative overflow-hidden">
        <div class="position-absolute" style="bottom: -50px; left: 0; transform: translateX(-50%);">
            <i class="fas fa-circle text-black-10 position-relative" style="font-size: 300px;"></i>
            <i class="fas fa-circle text-light position-absolute" style="font-size: 150px; top: 75px; left: 75px;"></i>
        </div>
        <div class="position-absolute" style="top: -50px; right: 0%; transform: translate(-50%, -50%);">
            <i class="fas fa-circle text-black-10 position-relative" style="font-size: 300px;"></i>
            <i class="fas fa-circle text-light position-absolute" style="font-size: 150px; top: 75px; left: 75px;"></i>
        </div>
        <div class="px-md-5">
            <div class="row align-items-center">
                <div class="col-lg-4 pr-lg-5 pb-3 pb-lg-0">
                    <img src="{{ asset($content['presentation']['first_pic']) }}" alt="Pic" class="img-fluid w-100">
                </div>
                <div class="col-lg-4 pb-3 pb-lg-0">
                    <div class="d-inline-block h3 border-bottom pb-3 mb-3 text-montserrat text-700">
                        {!! $content['presentation']['title'] !!}
                    </div>
                    <div>
                        <p>
                            {!! $content['presentation']['description'] !!}
                        </p>
                    </div>
                    <a class="btn-animate" href="#">
                        <div class="btn btn-lg btn-green primary pd-x-0 overflow-hidden rounded-sm static link text-montserrat position-relative">
                            <span class="d-block text-x-large py-1 pd-x-3">{{ __($content['presentation']['play_video']) }}</span>
                            <div class="bg-darkblue secondary align-items-center d-none active rounded-sm-right px-3 py-2 position-absolute h-100" style="top: 0; right: 0;">
                                <i class="fas fa-lg fa-arrow-alt-circle-right"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 pl-lg-5 pb-3 pb-lg-0">
                    <div class="rounded-lg shadow border bg-white" style="padding: 9px 12px;">
                        <img src="{{ asset($content['presentation']['second_pic']) }}" alt="Pic" class="img-fluid w-100 border shadow">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-4 py-5 text-white bg-darkblue position-relative">
        <div class="polygone position-absolute" style="top: -5%; right: 0; width: 23%; height: 84%; filter: drop-shadow(-5px 0px 5px rgba(50, 50, 0, 0.5));">
            <div class="bg-white w-100 h-100" style="clip-path: polygon(100% 0%, 20% 0%, 0% 20%, 50% 100%, 100% 100%);"></div>
        </div>
        <div class="polygone position-absolute" style="top: -5%; right: 0; width: 23%; height: 84%; filter: drop-shadow(-5px 0px 5px rgba(50, 50, 0, 0.5));">
            <div class="w-100 h-100" style="clip-path: polygon(100% 0%, calc(20% + 15px) 0%, 30px 20%, calc(50% + 15px) 100%, 100% 100%); background-image: url('{{ asset($content['level_courses']['polygon']) }}'); background-position: center; background-size: cover;"></div>
        </div>
        <div class="px-md-5 row">
            <div class="courses-section col-12" style="transform: scale(.78) translate(-11%, -11%);">
                <div class="text-left">
                    <div class="d-flex">
                        <i class="fas fa-play fa-3x"></i>
                        <h1 class="text-montserrat text-700 d-inline-block border-bottom border-white-50 pb-3 ml-4 mb-3">
                            {!! $content['level_courses']['title'] !!}
                        </h1>
                    </div>
                    <p class="pt-3 font-weight-light d-inline-block">
                        {!! $content['level_courses']['description'] !!}
                    </p>
                </div>

                <div class="row justify-content-center align-items-end pt-3">
                    @foreach ($courses as $course)
                        @component('components.course', $course)
                            Get started with us to learn the best crypto Training from the start...
                        @endcomponent
                    @endforeach
                </div>
            </div>
            <div class="col-12 pl-0">
                <div class="why-us" style="transform: scale(.8) translate(-10%, 0);">
                    <div class="text-left" style="width: 120%;">
                        <div class="d-flex">
                            <i class="fas fa-play fa-3x" style="opacity: 0;"></i>
                            <h2 class="text-montserrat text-700 flex-fill border-bottom border-white-50 pb-3 ml-4 mb-3">
                                <div class="d-inline-block position-relative">
                                    {!! $content['statics']['title'] !!}
                                    <div class="rounded-circle bg-white position-absolute" style="bottom: -1rem; left: 50%; transform: translate(-50%, 50%); width: 12px; height: 12px;"></div>
                                </div>
                            </h2>
                        </div>
                    </div>

                    <div class="row pt-5" style="width: 120%;">
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="d-flex justify-content-start px-5 justify-content-sm-center">
                                <div>
                                    <i class="why-us-content  fas fa-book text-orange fa-4x pr-3 mr-3 border-right border-white-50"></i>
                                </div>
                                <div class="flex-fill text-center">
                                    <div class="why-us-content text-x-large font-weight-light">{!! $content['statics']['course'] !!}</div>
                                    <div class="why-us-content text-allexist text-xx-large text-center"><span class="counter">03</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="d-flex justify-content-start px-5 justify-content-sm-center">
                                <div>
                                    <i class="why-us-content fas fa-user-friends text-orange fa-4x pr-3 mr-3 border-right border-white-50"></i>
                                </div>
                                <div class="flex-fill text-center">
                                    <div class="why-us-content text-x-large font-weight-light">{!! $content['statics']['enrolled'] !!}</div>
                                    <div class="why-us-content text-allexist text-xx-large text-center"><span class="counter">51</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="d-flex justify-content-start px-5 justify-content-sm-center">
                                <div>
                                    <i class="why-us-content fas fa-graduation-cap text-orange fa-4x pr-3 mr-3 border-right border-white-50"></i>
                                </div>
                                <div class="flex-fill text-center">
                                    <div class="why-us-content text-x-large font-weight-light">{!! $content['statics']['certified'] !!}</div>
                                    <div class="why-us-content text-allexist text-xx-large text-center"><span class="counter">20</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="d-flex justify-content-start px-5 justify-content-sm-center">
                                <div>
                                    <i class="why-us-content fas fa-user-tie text-orange fa-4x pr-3 mr-3 border-right border-white-50"></i>
                                </div>
                                <div class="flex-fill text-center">
                                    <div class="why-us-content text-x-large font-weight-light">{!! $content['statics']['trainer'] !!}</div>
                                    <div class="why-us-content text-allexist text-xx-large text-center"><span class="counter">05</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @component('components.section', [
        'bgColor' => 'light',
        'fontColor' => 'dark',
        'title' => [
            'color' => 'green',
            'text' => $content['testimonial']['title']
        ],
        'subtitle' => $content['testimonial']['description']
    ])
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme owl-loaded">
                    <div class="owl-stage-outer">
                        <div class="owl-stage pb-3">
                            @foreach ($testimonials as $testimonial)
                                <div class="owl-item">
                                    @component('components.testimonial', $testimonial)
                                    @endcomponent
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-montserrat">
                <div class="d-flex justify-content-end pt-4">
                    <a href="#" class="d-flex align-items-center text-dark">
                        <div class="font-weight-bold pr-2">{!! $content['testimonial']['full_list'] !!}</div>
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
    @endcomponent

    @component('components.section', [
        'bgColor' => 'light',
        'fontColor' => 'dark',
        'title' => [
            'color' => 'green',
            'text' => $content['blog']['title']
        ],
        'subtitle' => $content['blog']['description']
    ])
        <div class="row justify-content-center">
            @foreach ($posts as $post)
                @component('components.post', $post)
                {!! $post['body'] !!}
                @endcomponent
            @endforeach
            <div class="col-12 text-montserrat">
                <div class="d-flex justify-content-end pt-4">
                    <a href="{{ route('blog') }}" class="d-flex align-items-center text-darkblue">
                        <div class="font-weight-bold pr-2">{!! $content['testimonial']['full_list'] !!}</div>
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
    @endcomponent
</section>
@endsection

@section('scripts')
    <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
    <script>
        $(function () {
            const sliders = {!! json_encode($content['slider']['content']) !!};

            $(".owl-carousel").owlCarousel({ responsive: {0: {items: 1}, 1000: {items: 2}}, loop: true });

            const carousel = $('#carousel');

            const activeCarouselIndicator = $('.carousel-indicator.active');
            const { top, left } = activeCarouselIndicator.position();
            $('.circle-carousel-indicator').css({ top: top + 4, left: left + 14 }).removeClass('d-none');

            const data = [
                {
                    title: sliders[0].first,
                    content: sliders[0].second,
                    subcontent: sliders[0].third,
                    green: { top: 20 },
                    link: { text: 'Sign Up', href: '#' },
                    white: { top: 0, left: 0 },
                    orange: { bottom: -12, right: -22 }
                },
                {
                    title: sliders[1].first,
                    content: sliders[1].second,
                    subcontent: sliders[1].third,
                    green: { top: 40 },
                    link: { text: 'Read more', href: '#' },
                    white: { top: 0, left: -20 },
                    orange: { bottom: 12, right: 60 }
                },
                {
                    title: sliders[2].first,
                    content: sliders[2].second,
                    subcontent: sliders[2].third,
                    green: { top: 0 },
                    link: { text: 'Sign Up', href: '#' },
                    white: { top: -20, left: 20 },
                    orange: { bottom: 24, right: 10 }
                }
            ];
            carousel.on('slide.bs.carousel', function () {
                setTimeout(() => {
                    const index = +$('#carousel .carousel-indicator.active').attr('data-slide-to');
                    const { title, content, subcontent, green, link, white, orange } = data[index];

                    $('#banner .title').html(title);
                    $('#banner .content').html(content);
                    $('#banner .subcontent').html(subcontent);
                    $('#banner .link span').html(link.text);
                    $('#banner .link').attr('href', link.href);
                    $('#banner .circle.green').animate(green);
                    $('#banner .circle.white').animate(white);
                    $('#banner .circle.orange').animate(orange);

                    const activeCarouselIndicator = $('#carousel .carousel-indicator.active');
                    const { top, left } = activeCarouselIndicator.position();
                    $('.circle-carousel-indicator').animate({ top: top + 4, left: left + 14 }, 'fast');
                }, 1);
            });

            $('.level-card .trader-level').hide().removeClass('d-none');
            $('.level-card .card').hover(function () {
                const current = $(this);
                current.parent().children('.trader-level').stop().show('fast');
                current.find('.flex-nowrap').stop().animate({ left: 0 }, 'fast');
            }, function () {
                const current = $(this);
                current.parent().children('.trader-level').stop().hide('fast');
                current.find('.flex-nowrap').stop().animate({ left: '-100%' }, 'fast');
            });
        });
    </script>
@endsection
