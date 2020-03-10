@php
    $jsonString = file_get_contents(base_path('content.json'));
    $contentFile = json_decode($jsonString, true);
    $componentContent = $contentFile['pages'][Session::get('lang')]['components']['course'];
@endphp

<div class="col-xl-4 col-lg-4 col-sm-6 pb-3 pb-lg-0 d-flex flex-column position-relative level-card" {!! $add ?? '' !!}>
    {!! ($popular ?? '') ? '' : '
        <div class="trader-level position-absolute d-none" style="top: -25px; left: 4%; width: 92%;">
            <div class="mb-3 text-allexist text-larger border bg-' . $trader['color'] . ' border-white-50 py-2 px-2 d-flex" style="transform: scale(.9)">
                <div class="flex-fill text-x-large text-center">' . $trader['level'] . ' Trader</div>
                <i class="fas fa-graduation-cap pl-4 pr-4 border-left border-white-50 fa-2x"></i>
            </div>    
        </div>
    ' !!}
    <div class="card overflow-hidden border-0 bg-transparent shadow-lg"  {!! ($popular ?? '') ? '' : 'style="transform: scale(.9) translateY(5%);"' !!}>
        <div class="card-img-top position-relative overflow-hidden embed-responsive embed-responsive-4by3" style="background: url({{ asset($img) }}) no-repeat center; background-size: cover;">
            {{-- <img src="{{ $img ? asset($img) : "https://placehold.it/150x100" }}" alt="card-1" class="card-img-top"> --}}
            {!! ($popular ?? '') ? '<div class="bg-' . $color . ' w-100 pt-2 pb-1 text-uppercase h3 text-center text-white position-absolute" style="top: -30%; right: -50%; transform: rotate(45deg); transform-origin: 0 0;">' . $trader['level'] . '</div>' : '' !!}
        </div>
        <div class="card-body bg-{{ $color }}-gradient text-white position-relative">
            <div class="position-absolute bg-white d-flex justify-content-center align-items-center" style="width: 38px; height: 1px; left: 0; top: 25px;">
                <div class="position-absolute bg-white d-flex justify-content-center align-items-center rounded-circle" style="width: 22px; height: 22px;">
                    <div class="position-absolute bg-mydarkblue rounded-circle" style="width: 14px; height: 14px;"></div>
                </div>
            </div>
            <span class="bg-black-50 pb-1 pt-2 px-3 shadow rounded-left text-white text-baloo h4 m-0 position-absolute" style="right: 0; top: 10px; z-index: 10;">
                <span class="text-xx-large">$</span> {{ $price }}
            </span>
            <div class="d-flex card-text">
                <div class="ml-3">
                    <div class="text-white mb-3 h6 pl-3 pr-5 font-weight-bold text-montserrat position-relative">
                        {{ $subtitle }}
                    </div>
                    <div class="card-text row mr-0 p-2 border-top small text-comfortaa border-left border-white-50 pb-4 position-relative">
                        <div class="rounded-circle bg-orange position-absolute" style="width: 8px; height: 8px; bottom: -4px; left: -4px;"></div>
                        {{ Str::limit($subtitle) }}
                    </div>
                    <div class="pt-3 overflow-hidden small">
                        <div class="d-flex flex-nowrap position-relative" style="left: -100%;">
                            <a href="{{ $link }}" class="btn btn-{{ $color }} btn-block btn-lg shadow-sm" style="left: 0; flex: 0 0 100%;">{!! $componentContent['enroll_now'] !!} <i class="fas fa-arrow-alt-circle-right text-white border-left border-white-50 ml-3 pl-3"></i></a>
                            <div class="row m-0 position-relative" style="flex: 0 0 100%;">
                                <div class="col-3 pl-0 pr-1">
                                    <div class="d-flex">
                                        <div>
                                            <i class="fas fa-clock text-{{ $iconColor }}"></i>
                                        </div>
                                        <div class="pl-1">
                                            <div>{!! $componentContent['duration'] !!} </div>
                                            <div class="small font-weight-bold">
                                                {{ $duration }} {!! $componentContent['hrs'] !!} 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 pl-0 pr-1">
                                    <div class="d-flex">
                                        <div>
                                            <i class="fas fa-user-clock text-{{ $iconColor }}"></i>
                                        </div>
                                        <div class="pl-1">
                                            <div>{!! $componentContent['difficulty'] !!} </div>
                                            <div class="small font-weight-bold">
                                                <i class="fas fa-xs fa-star"></i>
                                                <i class="fas fa-xs fa-star"></i>
                                                <i class="far fa-xs fa-star"></i>
                                                <i class="far fa-xs fa-star"></i>
                                                <i class="far fa-xs fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 pl-0 pr-1">
                                    <div class="d-flex">
                                        <div>
                                            <i class="fas fa-user-friends text-{{ $iconColor }}"></i>
                                        </div>
                                        <div class="pl-1">
                                            <div>{!! $componentContent['reviews'] !!} </div>
                                            <div class="small font-weight-bold">
                                                {{ $reviews['mark'] }} <i class="fas text-yellow fa-star"></i>
                                                <span class="font-weight-normal">({{ $reviews['voters'] }})</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 pl-0 pr-1">
                                    <div class="d-flex">
                                        <div>
                                            <i class="fas fa-certificate text-{{ $iconColor }}"></i>
                                        </div>
                                        <div class="pl-1">
                                            <div>{!! $componentContent['certificate'] !!} </div>
                                            <div class="small font-weight-bold">{!! $componentContent['yes'] !!} </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>