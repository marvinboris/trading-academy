<div class="row">
    <div class="col-12 pb-3 text-white position-relative">
        <div class="circle">
            <div class="rounded-circle position-absolute embed-responsive embed-responsive-1by1" style="background-color: white; top: 0; left: 0; z-index: -1; transform: scale(.95);"></div>
            <div class="rounded-circle position-absolute embed-responsive embed-responsive-1by1" style="background-color: #008564; top: 0; left: 0; z-index: -2; transform: scale(1);"></div>
        </div>
        <div class="position-relative" style="top: 15px;">
            <div class="rounded-circle embed-responsive embed-responsive-1by1" style="background: url('{{ asset($img) }}') no-repeat center; background-size: cover;"></div>
            <div class="d-flex flex-column align-items-center details small mt-3" style="opacity: 0;">
                <div class="bg-dark" style="clip-path: polygon(50% 0%, calc(50% - .5rem) 100%, calc(50% + .5rem) 100%); height: 1rem; width: 100%;"></div>
                <div class="bg-dark py-2 px-3">
                    <div class="d-flex">
                        <div class="bg-green rounded-lg" style="width: 6px; height: 1rem;"></div>
                        <div class="pl-2">
                            <div class="d-flex">
                                <h6 class="text-montserrat font-weight-bold d-inline-block position-relative">
                                    {{ $name }}
                                    <div class="position-absolute w-50 border-bottom border-white-50"></div>
                                </h6>
                            </div>
                            <div class="pb-2 mb-2 border-bottom border-white-50">
                                {{ $resume }}
                            </div>
                            <div class="text-large">
                                <a class="text-white text-decoration-none" href="{{ $links['facebook'] }}"><i class="fab fa-facebook-square"></i></a>
                                <a class="text-white text-decoration-none" href="{{ $links['twitter'] }}"><i class="fab fa-twitter-square"></i></a>
                                <a class="text-white text-decoration-none" href="{{ $links['instagram'] }}"><i class="fab fa-instagram"></i></a>
                                <a class="text-white text-decoration-none" href="{{ $links['whatsapp'] }}"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>