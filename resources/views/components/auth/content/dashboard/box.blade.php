<div class="col-sm-6 col-md-4 col-lg-3">
    <div class="p-0 h-100 bg-{{ $bgColor }} text-{{ $color }} text-montserrat-alt">
        <div class="border-bottom border-white-20 px-4">
            <div class="py-2 position-relative font-weight-bold">
                <div class="text-large">{{ $title }}</div>
                <div class="rounded-circle bg-{{ $color }} d-flex justify-content-center align-items-center position-absolute" style="width: 15px; height: 15px; bottom: 0; transform: translateY(50%);">
                    <div class="rounded-circle bg-yellow d-flex justify-content-center align-items-center" style="width: 10px; height: 10px;"></div>
                </div>
            </div>
        </div>
        <div class="border-bottom border-white-20 px-4">
            <div class="py-3 position-relative">
                <div class="text-xx-large font-weight-bold">{{ $slot }}</div>
                <i class="position-absolute {{ $icon }} fa-fw fa-3x text-{{ $color }}-50" style="right: 0px; bottom: 10px;"></i>
            </div>
        </div>
    </div>
</div>