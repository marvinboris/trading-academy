@extends('layouts.app')

@section('content')
    <div class="container-fluid px-md-5 px-4 py-5 bg-dark text-white" style="background: linear-gradient(to right, rgba(0, 0, 0, .9), rgba(0, 0, 0, .9)), url('{{ asset($course['img']) }}') no-repeat center; background-size: cover;">
        <div class="pt-4 px-md-5">
            <div class="row text-montserrat">
                <div class="col-lg-8">
                    <h1>{{ $course['trader']['level'] }}</h1>
                    <h4>{{ $course['level'] }}</h4>
                    <div class="d-flex align-items-center pt-2">
                        <div class="mr-3">
                            <span class="rounded bg-{{ $course['color'] }}-gradient py-1 px-3 font-weight-bold d-inline-flex align-items-center">{{ $course['trader']['level'] }} Level <i class="fas fa-medal text-large fa-rotate-180 ml-2 pr-2 border-right border-white-50"></i> </span>
                        </div>
                        <div class="mr-3">
                            <i class="fas fa-user-friends text-yellow"></i> <strong>{{ $course['reviews']['mark'] }} <i class="fas fa-star"></i></strong>  ({{ $course['reviews']['voters'] }} reviews)
                        </div>
                        <div>
                            <i class="fas fa-comment text-yellow"></i> French
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 position-relative">
                    <aside class="card border-0 bg-transparent shadow position-absolute w-100">
                        <div class="d-flex justify-content-center align-items-center overflow-hidden card-img-top embed-responsive embed-responsive-16by9" style="background: url('{{ asset($course['img']) }}') no-repeat center; background-size: cover;"></div>
                        <div class="card-body bg-{{ $course['color'] }}-gradient position-relative">
                            <span class="position-absolute bg-yellow text-black text-baloo text-x-large px-3 rounded shadow pt-2" style="top: -.5rem; right: 1rem; transform: translateY(-50%);">$ {{ $course['price'] }}</span>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <div class="pb-4">
                                        <i class="fas fa-certificate text-yellow"></i>
                                        Guaranteed certificate
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-yellow font-weight-bold">Enroll Now</a>
                                    </div>
                                </div>
                                <div class="h-100">
                                    
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
                        <h2 class="text-montserrat">What you will learn</h2>
                        <div class="row">
                            @foreach ($course['what-you-will-learn'] as $item)
                                <div class="col-sm-6 d-flex">
                                    <div class="pr-2"><i class="fas fa-check text-secondary"></i></div>
                                    <div>{{ $item }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <h2 class="text-montserrat">Course content</h2>
                    <div>
                        <div class="accordion" id="accordion-course-content">
                            @foreach ($course['course-content'] as $key => $item)
                            <div class="card">
                                <div class="card-header py-2" id="heading{{ $key }}">
                                    <h2 class="mb-0">
                                    <button class="btn btn-link text-montserrat font-weight-bold text-decoration-none" type="button" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                                        <i class="fas text-green fa-{{ $key === 0 ? 'minus' : 'plus' }} mr-2"></i><span class="text-dark">{{ $item['title'] }}</span>
                                    </button>
                                    </h2>
                                </div>
                          
                                <div id="collapse{{ $key }}" class="collapse {{ $key === 0 ? 'show' : '' }} accordion-card-body" aria-labelledby="heading{{ $key }}" data-parent="#accordion-course-content">
                                    <div class="list-group list-group-flush border-top">
                                        @foreach ($item['subcontent'] as $subcontent)
                                        <li class="list-group-item">
                                            <i class="fas fa-play mr-2"></i>{{ $subcontent }}
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
                        <h4 class="text-montserrat">Comments</h4>
                        <form action="" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="search" name="search" id="search" class="form-control border-darkblue" placeholder="Search a comment...">
                                    <div class="input-group-append">
                                        <button class="btn btn-darkblue text-white">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row">
                        @foreach ($course['comments'] as $comment)
                        <div class="col-12 py-3 border-bottom">
                            <div class="row">
                                <div class="col-lg-4 d-flex">
                                    <div class="rounded-circle bg-secondary d-inline-flex mr-2 justify-content-center align-items-center text-white" style="width: 46px; height: 46px">{{ $comment['author']['abbr'] }}</div>
                                    <div class="flex-fill">
                                        <div class="text-muted">{{ Carbon\Carbon::parse($comment['date'])->diffForHumans() }}</div>
                                        {{ $comment['author']['name'] }}
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="pb-3">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $comment['mark'])
                                            <i class="fas fa-star text-yellow"></i>
                                            @else
                                            <i class="fas fa-star text-black-50"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <div>
                                        {{ $comment['text'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endcomponent
@endsection

@section('scripts')
    <script>
        $(function () {
            $('.accordion-card-body')
                .on('show.bs.collapse', function () {
                    const current = $(this);
                    $('#accordion-course-content').find('button.btn-link').children('i').removeClass('fa-minus').addClass('fa-plus');
                    current.parent().find('button.btn-link').children('i').removeClass('fa-plus').addClass('fa-minus');
                });
        });
    </script>
@endsection