@extends('layouts.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/star-rating-svg.css') }}">
<meta name="description" content="Commencez à apprendre le trading en ligne des crytomonnaies avec GIT Trading Academy Cameroun au niveau {{ $course->title }}." />
@endsection

@section('content')
    <div id="static-banner" class="container-fluid px-md-5 px-4 py-4 bg-dark text-white" style="background: linear-gradient(to right, rgba(0, 0, 0, .9), rgba(0, 0, 0, .9)), url('{{ asset($course->photo->path) }}') no-repeat center; background-size: cover;">
        <div class="px-md-5 py-2">
            <div class="row text-montserrat">
                <div class="col-lg-8">
                    <div class="h1">{{ $course->title }}</div>
                    <h1 class="text-x-large">{{ $course->subtitle }}</h1>
                    <div class="pt-2">
                        <span class="rounded-sm bg-{{ $colors[$course->slug] }}-gradient py-2 px-3 font-weight-bold d-inline-flex mr-2 mb-2 d-lg-none align-items-center">{{ $course->level_name }}<i class="fas fa-medal text-large fa-rotate-180 ml-2 pr-2 border-right border-white-50"></i> </span>
                        <span class="rounded-sm bg-{{ $colors[$course->slug] }}-gradient py-2 px-3 font-weight-bold d-lg-inline-flex d-none mr-2 align-items-center">{{ $course->level_name }}<i class="fas fa-medal text-large fa-rotate-180 ml-2 pr-2 border-right border-white-50"></i> </span>
                        <i class="fas fa-user-friends text-yellow"></i> <strong>{{ $course->mark() }} <i class="fas text-orange fa-star"></i></strong>  ({{ count($course->views) }} review{{ count($course->views) > 1 ? 's' : '' }})
                        <i class="fas fa-comment text-yellow"></i> {{ $course->lang }}
                    </div>
                    <div class="pt-2">
                        Created by <strong>{{ $course->teacher->user->name() }}</strong>.
                        Last updated {{ $course->updated_at->format('D, d M Y') }}
                    </div>
                </div>
                <div id="static-card" class="col-lg-4 position-relative d-none d-lg-block">
                    <aside class="card border-0 bg-transparent shadow position-absolute w-100">
                        <div class="d-flex justify-content-center align-items-center overflow-hidden card-img-top embed-responsive embed-responsive-16by9" style="background: url('{{ asset($course->photo->path) }}') no-repeat center; background-size: cover;">
                            <div class="rounded-circle d-flex justify-content-center align-items-center">
                                <span class="fa-stack fa-4x">
                                    <i class="fas fa-circle text-black fa-stack-2x"></i>
                                    <i class="fas fa-play fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                        </div>
                        <div class="card-body bg-{{ $colors[$course->slug] }}-gradient position-relative">
                            <span class="position-absolute bg-yellow text-black text-baloo text-x-large px-3 rounded shadow pt-2" style="top: -.5rem; right: 1rem; transform: translateY(-50%);">$ {{ $course->price }}</span>
                            <div class="">
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <div class="pb-2">
                                        <i class="fas fa-certificate text-yellow"></i>
                                        {!! $content['box']['certificate_guaranteed'] !!}
                                    </div>
                                    <div>
                                        @if ($can_enroll)
                                        <a href="{{ route('student.courses.enroll', $course->id) }}" class="btn btn-yellow font-weight-bold">{!! $content['box']['enroll_now'] !!}</a>
                                        @else
                                        <h4 class="text-700 text-white"><i class="fas fa-check-circle"></i> {{ $content['already_enrolled'] }}</h4>
                                        @endif
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <h5>{!! $content['box']['includes'] !!}:</h5>
                                    <ul class="fa-ul pb-0 pl-0 my-0 ml-4">
                                        <li><i class="fas fa-file-video fa-li"></i> {{ $course->includes->videos }}</li>
                                        <li><i class="fas fa-file fa-li"></i> {{ $course->includes->lessons }}</li>
                                        <li><i class="fas fa-compass fa-li"></i> {{ $course->includes->access }}</li>
                                        <li><i class="fas fa-mobile-alt fa-li"></i> {{ $course->includes->media }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    @component('components.section', [
        'bgColor' => 'white',
        'fontColor' => 'dark',
        'title' => [
            'color' => '',
            'text' => ''
        ],
        'subtitle' => ''
    ])
        <div class="row">
            <div class="col-lg-8">
                <div class="card bg-light">
                    <div class="card-body">
                        <h2 class="text-montserrat">{!! $content['what_you_will_learn'] !!}</h2>
                        <div class="row">
                            @foreach ($course->what_you_will_learn as $item)
                                <div class="col-sm-6 d-flex">
                                    <div class="pr-2"><i class="fas fa-check text-secondary"></i></div>
                                    <div>{{ $item }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row mt-4">
                    <div class="col-lg-8">
                        <div>
                            <h2 class="text-montserrat">{!! $content['course_content'] !!}</h2>
                            <div>
                                <div class="accordion" id="accordion-course-content">
                                    @foreach ($course->course_content as $key => $item)
                                    <div class="card">
                                        <div class="card-header py-2" type="button" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}" id="heading{{ $key }}">
                                            <h2 class="mb-0">
                                            <button class="btn btn-link text-montserrat font-weight-bold text-decoration-none">
                                                <i class="fas text-green fa-{{ $key === 0 ? 'minus' : 'plus' }} mr-2"></i><span class="text-dark">{{ $item->title }}</span>
                                            </button>
                                            </h2>
                                        </div>

                                        <div id="collapse{{ $key }}" class="collapse {{ $key === 0 ? 'show' : '' }} accordion-card-body" aria-labelledby="heading{{ $key }}" data-parent="#accordion-course-content">
                                            <div class="list-group list-group-flush border-top">
                                                @foreach ($item->content as $subcontent)
                                                <li class="list-group-item">
                                                    <i class="fas fa-play ml-4 pl-2 mr-2"></i>{{ $subcontent }}
                                                </li>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="d-flex justify-content-between align-items-center border-bottom">
                                <h4 class="text-montserrat">{!! $content['reviews'] !!}</h4>
                                {{-- <form action="" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" name="search" id="search" class="form-control border-darkblue" placeholder="Search a review...">
                                            <div class="input-group-append">
                                                <button class="btn btn-darkblue text-white">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form> --}}
                            </div>

                            <div class="row">
                                @foreach ($course->views()->latest()->get() as $view)
                                <div class="col-12 py-3 border-bottom">
                                    <div class="row">
                                        <div class="col-lg-4 d-flex">
                                            <div>
                                                {!! $view->user->photo ?
                                                '<div style="background: url(' . asset($view->user->photo->path) . ') no-repeat center; background-size: cover; width: 46px; outline-offset: 4px; box-shadow: 0 0 0 2px white;" class="rounded-circle embed-responsive embed-responsive-1by1 mr-2"></div>'
                                                :
                                                '<div class="d-flex justify-content-center align-items-center font-weight-bold text-white text-montserrat rounded-circle bg-black-50 text-x-small mr-2" style="width: 46px; height: 46px; outline-offset: 4px; box-shadow: 0 0 0 2px white;">' . $view->user->abbreviation() . '</div>'
                                                !!}    
                                            </div>
                                            
                                            {{-- <div class="rounded-circle bg-secondary d-inline-flex mr-2 justify-content-center align-items-center text-white" style="width: 46px; height: 46px">{{ $view->user->abbreviation() }}</div> --}}
                                            <div class="flex-fill">
                                                <div class="text-muted">{{ $view->created_at->diffForHumans() }}</div>
                                                <span class="text-700 text-montserrat">{{ $view->user->name() }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="pb-3">
                                                <h5 class="text-700 text-montserrat">{{ $view->title }}</h5>
                                                <div class="read-only-stars" data-rating="{{ $view->mark }}"></div>
                                            </div>
                                            <div>
                                                {{ $view->body }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            @if ($can_comment)
                            <div class="card mt-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <span>{{ $content['leave_comment'] }} :</span>
                                    <div>
                                        <div class="ranking-stars" data-rating="2.5"></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('courses.view', $course->slug) }}" method="post" class="ajax">
                                        @csrf
                                        <input type="hidden" name="mark">
                                        <div class="form-group">
                                            <input type="text" name="title" id="title" class="form-control" required placeholder="{{ $content['title'] }}">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="body" id="body" class="form-control" placeholder="{{ $content['body'] }}" required></textarea>
                                        </div>
                                        <button class="btn btn-green">{{ $content['submit'] }} <i class="fas fa-arrow-circle-right ml-1"></i></button>
                                    </form>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="pt-4 pt-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="text-montserrat">{!! $content['requirements'] !!}</h2>
                                    <div>
                                        <ul class="pl-3">
                                            @foreach ($course->requirements as $item)
                                            <li class="mb-2">{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <h2 class="text-montserrat">{!! $content['description'] !!}</h2>
                            <div>
                                {!! $course->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-block d-lg-none">
                <aside class="card border-0 bg-transparent shadow text-white w-100">
                    <div class="d-flex justify-content-center align-items-center overflow-hidden card-img-top embed-responsive embed-responsive-16by9" style="background: url('{{ asset($course->photo->path) }}') no-repeat center; background-size: cover;">
                        <div class="rounded-circle d-flex justify-content-center align-items-center">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle text-black fa-stack-2x"></i>
                                <i class="fas fa-play fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                    </div>
                    <div class="card-body bg-{{ $colors[$course->slug] }}-gradient position-relative">
                        <span class="position-absolute bg-yellow text-black text-baloo text-x-large px-3 rounded shadow pt-2" style="top: -.5rem; right: 1rem; transform: translateY(-50%);">$ {{ $course->price }}</span>
                        <div class="">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div class="pb-2">
                                    <i class="fas fa-certificate text-yellow"></i>
                                    {!! $content['box']['certificate_guaranteed'] !!}
                                </div>
                                <div>
                                    @if ($can_enroll)
                                    <a href="{{ route('student.courses.enroll', $course->id) }}" class="btn btn-yellow font-weight-bold">{!! $content['box']['enroll_now'] !!}</a>
                                    @else
                                    <h4 class="text-700 text-white"><i class="fas fa-check-circle"></i> {{ $content['already_enrolled'] }}</h4>
                                    @endif
                                </div>
                            </div>
                            <div class="pt-2">
                                <h5>{!! $content['box']['includes'] !!}:</h5>
                                <ul class="fa-ul pb-0 pl-0 my-0 ml-4">
                                    <li><i class="fas fa-file-video fa-li"></i> {{ $course->includes->videos }}</li>
                                    <li><i class="fas fa-file fa-li"></i> {{ $course->includes->lessons }}</li>
                                    <li><i class="fas fa-compass fa-li"></i> {{ $course->includes->access }}</li>
                                    <li><i class="fas fa-mobile-alt fa-li"></i> {{ $course->includes->media }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    @endcomponent

    <div class="d-none d-lg-block">
        <div id="fixed-banner" class="container-fluid position-fixed px-md-5 bg-black-80 text-white" style="top: 58px; z-index: 1500px; display: none;">
            <div class="px-md-5 pt-2 pb-3">
                <div class="row text-montserrat">
                    <div class="col-lg-8">
                        <h2>{{ $course->title }}</h2>
                        <div class="d-flex align-items-center">
                            <div class="mr-3">
                                <span class="rounded-sm bg-{{ $colors[$course->slug] }}-gradient py-2 px-3 font-weight-bold d-inline-flex align-items-center">{{ $course->level_name }}<i class="fas fa-medal text-large fa-rotate-180 ml-2 pr-2 border-right border-white-50"></i> </span>
                            </div>
                            <div class="mr-3">
                                <i class="fas fa-user-friends text-yellow"></i> <strong>{{ $course->mark() }} <i class="fas text-orange fa-star"></i></strong>  ({{ count($course->views) }} review{{ count($course->views) > 1 ? 's' : '' }})
                            </div>
                            <div>
                                <i class="fas fa-comment text-yellow"></i> {{ $course->lang }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 position-relative">
                        <aside class="card border-0 bg-transparent shadow position-absolute w-100">
                            <div class="d-none justify-content-center align-items-center overflow-hidden card-img-top embed-responsive embed-responsive-16by9" style="background: url('{{ asset($course->photo->path) }}') no-repeat center; background-size: cover;"></div>
                            <div class="card-body bg-{{ $colors[$course->slug] }}-gradient position-relative">
                                <span class="position-absolute text-white text-baloo text-xx-large px-3 rounded pt-2" style="top: 1rem; right: 1rem;"><i class="fas fa-dollar-sign"></i> {{ $course->price }}</span>
                                <div class="">
                                    <div class="d-flex flex-column justify-content-between h-100">
                                        <div>
                                            @if ($can_enroll)
                                            <a href="{{ route('student.courses.enroll', $course->id) }}" class="btn btn-yellow btn-block w-50 text-large font-weight-bold">{!! $content['box']['enroll_now'] !!}</a>
                                            @else
                                            <h4 class="text-700 text-white"><i class="fas fa-check-circle"></i> {{ $content['already_enrolled'] }}</h4>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <i class="fas fa-certificate text-yellow"></i>
                                        {!! $content['box']['certificate_guaranteed'] !!}
                                    </div>
                                    <div class="pt-2">
                                        <h5>{!! $content['box']['includes'] !!}:</h5>
                                        <ul class="fa-ul pb-0 pl-0 my-0 ml-4">
                                            <li><i class="fas fa-file-video fa-li"></i> {{ $course->includes->videos }}</li>
                                            <li><i class="fas fa-file fa-li"></i> {{ $course->includes->lessons }}</li>
                                            <li><i class="fas fa-compass fa-li"></i> {{ $course->includes->access }}</li>
                                            <li><i class="fas fa-mobile-alt fa-li"></i> {{ $course->includes->media }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            const fixedBanner = $('#fixed-banner');
            const staticBanner = $('#static-banner');
            const staticCard = $('#static-card');
            const bottom = staticBanner.offset().top + staticBanner.outerHeight();

            if ($(document).scrollTop() < bottom) {
                fixedBanner.hide();
                staticCard.show();
            }
            else {
                fixedBanner.show();
                staticCard.hide();
            }

            $('.accordion-card-body')
                .on('show.bs.collapse', function () {
                    const current = $(this);
                    $('#accordion-course-content').find('button.btn-link').children('i').removeClass('fa-minus').addClass('fa-plus');
                    current.parent().find('button.btn-link').children('i').removeClass('fa-plus').addClass('fa-minus');
                });

            $(document).scroll(function () {
                const value = $(this).scrollTop();
                if (value < bottom) {
                    fixedBanner.hide();
                    staticCard.show();
                }
                else {
                    fixedBanner.show();
                    staticCard.hide();
                }
            });
        });
    </script>
@endsection
