<div class="col-md-4">
    <div class="card" style="background: url('{{ $img ? $img : 'https://placehold.it/150x100' }}') no-repeat center; background-size: cover;">
        <div class="card-img-top embed-responsive embed-responsive-16by9 position-relative">
            <div class="bg-dark-80 py-2 px-3 rounded-left position-absolute" style="top: 20px; right: 0px;">
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
                    <div class="font-weight-bold font-size-large pl-3 text-white">
                        {{ $date }}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-darkblue-80 text-white">
            <div class="d-flex">
                <div class="pt-2">
                    <div class="d-flex bg-white position-relative justify-content-center align-items-center" style="width: 4px; height: 50px; border-radius: 5px;">
                        <div class="bg-yellow rounded-circle position-absolute shadow-lg d-flex justify-content-center align-items-center" style="width: 12px; height: 12px; top: 5px;">
                        </div>
                    </div>
                </div>
                <div class="ml-3">
                    <div class="font-weight-bold text-white border-bottom border-white-25 d-inline-block pb-1 mb-2 text-uppercase">
                        {{ $title }}
                    </div>
                    <div class="card-text font-family-comfortaa text-light font-weight-light text-justify pb-4">
                        {{ $slot }}
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ $link }}" class="btn btn-light btn-sm text-darkblue shadow-lg">
                                <div class="small font-weight-bold px-3 py-1">
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