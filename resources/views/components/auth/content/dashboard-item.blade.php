<div class="col-sm-6 col-md-4 col-lg-3">
    <div class="rounded h-100 shadow-sm p-2 bg-{{ $bgColor }} text-{{ $color }} d-flex position-relative">
        <div class="pr-2">
            <div class="rounded-circle bg-{{ $color }}" style="width: 15px; height: 15px;"></div>
        </div>
        <div class="pt-2 flex-fill">
            <div class="text-large">{{ $title }}</div>
            <div class="text-xx-large text-baloo">{{ $slot }}</div>
        </div>
        <i class="position-absolute {{ $icon }} fa-fw fa-2x text-{{ $color }}-50" style="right: 10px; bottom: 10px;"></i>
    </div>
</div>