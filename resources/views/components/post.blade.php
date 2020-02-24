<div class="col-xl-4 col-lg-6 col-md-8 col-sm-12 pb-3 pb-lg-0">
    <div class="card border-0" style="background: transparent url('{{ $img ? asset($img) : 'https://placehold.it/150x100' }}') no-repeat center; background-size: cover;">
        <div class="card-img-top embed-responsive embed-responsive-16by9 position-relative">
            <div class="bg-black-33 py-2 px-3 rounded-left position-absolute" style="top: 20px; right: 0px;">
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <i class="fas fa-calendar-alt fa-2x text-white"></i>
                    </div>
                    <div>
                        <div class="d-flex bg-white position-relative justify-content-center align-items-center" style="width: 1px; height: 30px; border-radius: 5px;">
                            <div class="bg-yellow rounded-circle position-absolute shadow-lg d-flex justify-content-center align-items-center" style="width: 10px; height: 10px;">
                            </div>
                        </div>
                    </div>
                    <div class="font-weight-bold text-montserrat text-large pl-3 text-white">
                        {{ $date }}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-darkblue-80 text-white">
            <div class="">
                <div class="">
                    <div class="font-weight-bold border-bottom border-white-25 pb-1 mb-2 text-yellow text-montserrat">
                        <div class="text-truncate overflow-hidden w-100" title="{{ $title }}">{{ $title }}</div>
                    </div>
                    <div class="card-text text-light font-weight-light text-justify pb-3">
                        {{ $slot }}
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ $link }}" class="btn btn-light btn-sm text-green shadow-lg rounded-0">
                                <div class="small font-weight-bold text-montserrat px-3 py-1">
                                    Read More
                                </div>
                            </a>
                        </div>
                        <div>
                            <i class="fab fa-2x pl-2 fa-facebook-square"></i>
                            <i class="fab fa-2x pl-2 fa-twitter-square"></i>
                            <i class="fab fa-2x pl-2 fa-instagram"></i>
                            <i class="fab fa-2x pl-2 fa-whatsapp"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
