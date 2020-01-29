<div class="col-md-4">
    <div class="card overflow-hidden">
        <div class="card-img-top position-relative overflow-hidden">
            <img src="{{ $img ? $img : "https://placehold.it/150x100" }}" alt="card-1" class="card-img-top">
            {!! $popular ? '<div class="bg-yellow w-100 pt-2 pb-1 font-family-baloo h3 text-center text-dark position-absolute" style="top: -40%; right: -50%; transform: rotate(45deg); transform-origin: 0 0;">Popular</div>' : '' !!}
        </div>
        <div class="card-body bg-{{ $color }} text-white position-relative">
            <span class="bg-yellow pt-3 pb-2 px-4 shadow rounded-xl text-dark font-family-baloo h4 position-absolute" style="right: 15px; top: -15px;">
                $ {{ $price }}
            </span>
            <div class="d-flex">
                <div class="pt-2">
                    <div class="d-flex bg-yellow position-relative justify-content-center align-items-center" style="width: 12px; height: 55px; border-radius: 5px;">
                        <div class="bg-white rounded-circle position-absolute shadow-lg d-flex justify-content-center align-items-center" style="width: 18px; height: 18px; top: {{ $position }}px;">
                            <div class="bg-{{ $color }} rounded-circle" style="width: 12px; height: 12px;"></div>
                        </div>
                    </div>
                </div>
                <div class="ml-3">
                    <div class="font-family-baloo text-white border-bottom border-white-25 d-inline-block mb-3 h1 position-relative">
                        {{ $level }}
                        <i class="fas fa-medal position-absolute text-black-50 fa-rotate-180" style="left: 100%; z-index: 1;"></i>
                    </div>
                    <div class="card-text text-justify pb-4">
                        {{ $slot }}
                    </div>
                    <div class="pt-3 border-top border-white-25 small">
                        <div class="row m-0">
                            <div class="col-3 pl-0 pr-1">
                                <div class="d-flex">
                                    <div>
                                        <i class="fas fa-clock text-yellow"></i>
                                    </div>
                                    <div class="pl-1">
                                        <div>Duration</div>
                                        <div class="small font-weight-bold">
                                            {{ $duration }} Hrs
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 pl-0 pr-1">
                                <div class="d-flex">
                                    <div>
                                        <i class="fas fa-user-clock text-yellow"></i>
                                    </div>
                                    <div class="pl-1">
                                        <div>Difficulty</div>
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
                                        <i class="fas fa-user-friends text-yellow"></i>
                                    </div>
                                    <div class="pl-1">
                                        <div>Reviews</div>
                                        <div class="small font-weight-bold">
                                            {{ $reviews['mark'] }} <i class="fas fa-star"></i>
                                            <span class="font-weight-normal">({{ $reviews['voters'] }})</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 pl-0 pr-1">
                                <div class="d-flex">
                                    <div>
                                        <i class="fas fa-certificate text-yellow"></i>
                                    </div>
                                    <div class="pl-1">
                                        <div>Certificate</div>
                                        <div class="small font-weight-bold">
                                            {{ $certificate ? 'Yes' : 'No' }}
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