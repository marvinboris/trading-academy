@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
@endsection

@section('content')
<section class="home">
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
                        <div class=" text-orange h1 title">
                            Welcome to
                        </div>  
                        <div class="my-5">
                            <div>
                                <div class="w-75 position-relative">
                                    <div class="rounded-circle bg-orange shadow position-absolute" style="width: 100px; height: 100px; top: -20px; right: 20px;"></div>
                                    <div class="rounded-circle bg-light shadow position-absolute" style="width: 57px; height: 57px; top: 60px; right: -20px;"></div>
                                    <div class="rounded-circle bg-green shadow position-absolute" style="width: 62px; height: 62px; top: 20px; right: -10px;"></div>
                                    <div class="text-allexist text-white display-4 content py-4 pl-5 mb-4 rounded-0 bg-soft-gradient">
                                        The best African Crypto <br>
                                        Trading School
                                    </div>
                                </div>
                                <div class="lead text-white  subcontent">
                                    Get started with to learn the best crypto trading<br>Techniques and be the best
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="#" class="btn-group text-allexist link text-decoration-none">
                                <span class="btn btn-green btn-lg rounded-0 px-5 py-3">Sign Up</span>
                                <div class="d-inline-flex justify-content-center align-items-center bg-darkblue text-white rounded-0 pr-3 pl-3">
                                    <i class="fas fa-2x fa-arrow-alt-circle-right"></i>
                                </div>
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
                    <span class="fas fa-arrow-alt-circle-left fa-4x text-white" aria-hidden="true"></span>
                    {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="fas fa-arrow-alt-circle-right fa-4x text-white" aria-hidden="true"></span>
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
                    <img src="{{ url('/images/cryptocurrency_esoteric-768x768@2x.png') }}" alt="Pic" class="img-fluid w-100">
                </div>
                <div class="col-lg-4 pb-3 pb-lg-0">
                    <div class="d-inline-block h3 border-bottom pb-3 mb-3 text-allexist">
                        What you have to know on your Crypto Trading Academy
                    </div>
                    <div>
                        <p>
                            Get started with to learn the best crypto trading <br>Technics and be the best
                        </p>
                        <p>
                            In order to become financially independent, Global Investment Trading is tagged to bring to you the one and only way that has made his name. THE CRYPTO TRADING ACADEMY (by Global Investment Trading). From this site, you are going to learn all the needed skills to get familiar with Crypto Currency Market and become financially independent.
                        </p>
                    </div>
                    <a href="#" class="btn-group text-allexist link text-decoration-none">
                        <span class="btn btn-green btn-lg rounded-0 px-5 py-3 text-x-large">Play Video</span>
                        <div class="d-inline-flex justify-content-center align-items-center bg-darkblue text-white rounded-0 pl-3 pr-3">
                            <i class="fas fa-2x fa-arrow-alt-circle-right"></i>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 pl-lg-5 pb-3 pb-lg-0">
                    <div class="rounded-lg shadow border bg-white" style="padding: 9px 12px;">
                        <img src="{{ url('/images/IronX-Crypto-exchange-Blog.jpg') }}" alt="Pic" class="img-fluid w-100 border shadow">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid px-4 py-5 text-white bg-darkblue position-relative">
        <div class="position-absolute" style="top: -5%; right: 0; width: 23%; height: 84%; filter: drop-shadow(-5px 0px 5px rgba(50, 50, 0, 0.5));">
            <div class="bg-white w-100 h-100" style="clip-path: polygon(100% 0%, 20% 0%, 0% 20%, 50% 100%, 100% 100%);"></div>
        </div>
        <div class="position-absolute" style="top: -5%; right: 0; width: 23%; height: 84%; filter: drop-shadow(-5px 0px 5px rgba(50, 50, 0, 0.5));">
            <div class="w-100 h-100" style="clip-path: polygon(100% 0%, calc(20% + 15px) 0%, 30px 20%, calc(50% + 15px) 100%, 100% 100%); background-image: url('{{ url('/images/ss-shattering-ath-bitcoin.jpg') }}'); background-position: center; background-size: cover;"></div>
        </div>
        <div class="px-md-5 row">
            <div class="col-12 pr-0" style="transform: scale(.78) translate(-11%, -11%);">
                <div class="text-left">
                    <div class="d-flex">
                        <i class="fas fa-play fa-3x"></i>
                        <h1 class="text-allexist d-inline-block border-bottom border-white-50 pb-3 ml-4 mb-3">
                            We have the right course for you.
                        </h1>
                    </div>
                    <p class="pt-3 font-weight-light d-inline-block">
                        The Crypto trading academy gives you the opportunity to start learning from the very basics. Getting into to Crypto Currency Trading has never been an easy decision to take. But as our Goal is to make everyone financially independent through this training, all the trainees will have to start from a beginner level and later can be qualified to go to the next level.
                    </p>
                </div>
        
                <div class="row justify-content-center align-items-end">
                    @foreach ($courses as $course)
                        @component('components.course', $course)
                            Get started with us to learn the best crypto Training from the start...
                        @endcomponent    
                    @endforeach
                </div>
            </div>
            <div class="col-12 pl-0">
                <div style="transform: scale(.8) translate(-10%, 0);">
                    <div class="text-left" style="width: 120%;">
                        <div class="d-flex">
                            <i class="fas fa-play fa-3x" style="opacity: 0;"></i>
                            <h2 class="text-allexist flex-fill border-bottom border-white-50 pb-3 ml-4 mb-3">
                                <div class="d-inline-block position-relative">
                                    Why choose us ?
                                    <div class="rounded-circle bg-white position-absolute" style="bottom: -1rem; left: 50%; transform: translate(-50%, 50%); width: 12px; height: 12px;"></div>
                                </div>
                            </h2>
                        </div>
                    </div>
        
                    <div class="row pt-5" style="width: 120%;">
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-center">
                                <div>
                                    <i class="fas fa-book text-orange fa-4x pr-3 mr-3 border-right border-white-50"></i>
                                </div>
                                <div>
                                    <div class=" text-x-large font-weight-light">Courses</div>
                                    <div class="text-allexist text-xx-large">03</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-center">
                                <div>
                                    <i class="fas fa-user-friends text-orange fa-4x pr-3 mr-3 border-right border-white-50"></i>
                                </div>
                                <div>
                                    <div class=" text-x-large font-weight-light">Total enrolled</div>
                                    <div class="text-allexist text-xx-large">51</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-center">
                                <div>
                                    <i class="fas fa-graduation-cap text-orange fa-4x pr-3 mr-3 border-right border-white-50"></i>
                                </div>
                                <div>
                                    <div class=" text-x-large font-weight-light">Certified</div>
                                    <div class="text-allexist text-xx-large">20</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-center">
                                <div>
                                    <i class="fas fa-user-tie text-orange fa-4x pr-3 mr-3 border-right border-white-50"></i>
                                </div>
                                <div>
                                    <div class=" text-x-large font-weight-light">Trainers</div>
                                    <div class="text-allexist text-xx-large">05</div>
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
            'text' => 'What they are saying on our course content'
        ],
        'subtitle' => 'We always wanted go give out the best to all our trainees. We alone cannot convince you. Check out by yourself if we are credible or not.'
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
    @endcomponent
    
    @component('components.section', [
        'bgColor' => 'light',
        'fontColor' => 'dark',
        'title' => [
            'color' => 'green',
            'text' => 'Our Blog'
        ],
        'subtitle' => 'Find out the latest news from our blog'
    ])
        <div class="row">
            @foreach ($posts as $post)
                @component('components.post', $post)
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum culpa minus quod
                @endcomponent    
            @endforeach
            <div class="col-12 text-montserrat">
                <div class="d-flex justify-content-end pt-4">
                    <a href="{{ route('blog') }}" class="d-flex align-items-center text-darkblue">
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
    @endcomponent
</section>
@endsection

@section('scripts')
    <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
    <script>
        $(function () {
            $(".owl-carousel").owlCarousel({ items: 2, loop: true });

            const data = [
                {
                    title: 'Welcome to',
                    content: 'The best African Crypto <br>Trading School',
                    subcontent: 'Get started with to learn the best crypto trading<br>Techniques and be the best',
                    green: { top: 20 },
                    link: { text: 'Sign Up', href: '#' },
                    white: { top: 0, left: 0 },
                    orange: { bottom: -12, right: -22 }
                },
                {
                    title: 'Learn More',
                    content: 'We offer the best Crypto <br>Trading courses',
                    subcontent: 'Want to know more ?',
                    green: { top: 40 },
                    link: { text: 'Read more', href: '#' },
                    white: { top: 0, left: -20 },
                    orange: { bottom: 12, right: 60 }
                },
                {
                    title: 'Get the best',
                    content: 'Crypto Trading<br>courses here',
                    subcontent: 'Get started with to learn the best crypto trading<br>Techniques and be the best',
                    green: { top: 0 },
                    link: { text: 'Sign Up', href: '#' },
                    white: { top: -20, left: 20 },
                    orange: { bottom: 24, right: 10 }
                }
            ];
            $('#carousel').on('slide.bs.carousel', function () {
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