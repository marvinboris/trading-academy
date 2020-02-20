<div class="{{ $size }}">
    <div class="bg-{{ $bgColor }} overflow-hidden border border-{{ $borderColor }} text-{{ $color }}">
        <div class="border-bottom border-{{ $borderColor }} bg-{{ $headBgColor }} d-flex justify-content-between p-3">
            <div>
                <i class="{{ $icon }} fa-lg mr-2"></i>
                <span class="font-weight-bold text-montserrat">{{ $title }}</span>
            </div>
            <div class="text-{{ $color }}-50">
                <i class="fas fa-arrows-alt mr-2"></i>
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="p-3">
            {{ $slot }}
        </div>
    </div>
</div>