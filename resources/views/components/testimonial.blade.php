<div class="col-md-4">
    <div class="card" style="background: url('{{ $img ? $img : 'https://placehold.it/150x100' }}') no-repeat center; background-size: cover;">
        <div class="card-img-top embed-responsive embed-responsive-4by3">
        </div>
        <div class="card-body bg-green-50 text-white">
            <div class="ml-3">
                <div class="font-weight-bold text-center text-yellow h4 m-0">
                    {{ $name }}
                </div>
                <div class="card-text font-family-comfortaa text-light font-weight-light text-center border-bottom border-white-25 pb-1 mb-2 ">
                    {{ $title }}
                </div>
                <div class="d-flex justify-content-center align-items-center pt-2">
                    <a href="{{ $links['facebook'] }}" class="text-decoration-none text-white"><i class="fab fa-2x px-2 fa-facebook-square"></i></a>
                    <a href="{{ $links['twitter'] }}" class="text-decoration-none text-white"><i class="fab fa-2x px-2 fa-twitter-square"></i></a>
                    <a href="{{ $links['linkedin'] }}" class="text-decoration-none text-white"><i class="fab fa-2x px-2 fa-linkedin"></i></a>
                    <a href="{{ $links['instagram'] }}" class="text-decoration-none text-white"><i class="fab fa-2x px-2 fa-instagram"></i></a>
                    <a href="{{ $links['skype'] }}" class="text-decoration-none text-white"><i class="fab fa-2x px-2 fa-skype"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>