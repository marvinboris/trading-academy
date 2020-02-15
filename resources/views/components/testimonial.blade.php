<div class="col-12">
    <div class="row">
        <div class="col-lg-6 col-md-8 pb-3 pb-lg-0">
            <div class="card border-0 bg-transparent" style="background: url('{{ $img ? $img : 'https://placehold.it/150x100' }}') no-repeat center; background-size: cover;">
                <div class="card-img-top embed-responsive embed-responsive-4by3">
                </div>
                <div class="card-body bg-darkblue-80 text-white">
                    <div class="ml-3">
                        <div class="font-weight-normal text-allexist h4">
                            {{ $name }}
                        </div>
                        <div class="card-text text-light font-weight-light pb-1 mb-2 ">
                            {{ $title }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="bg-white rounded-0 shadow-sm px-3 py-4 h-100">
                <div class="d-flex align-items-end pb-3 mb-3 border-bottom">
                    <div class="bg-black-33 d-flex justify-content-center align-items-center position-relative" style="width: 2px; height: 70px;">
                        <div class="bg-white border rounded-circle border-secondary position-absolute" style="width: 12px; height: 12px;"></div>
                    </div>
                    <div class="text-green pl-3 font-weight-bold h4 m-0 text-montserrat">{{ $postTitle }}</div>
                </div>
                <div class="text-small">
                    {{ $text }}
                </div>
            </div>
        </div>
    </div>
</div>