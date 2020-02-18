<a href="{{ $link }}" class="btn btn-green text-left @if (url()->current() === $link) border-top-0 border-bottom-0 border-right-0 border-8 border-white active @else border-0 @endif p-0 d-block text-decoration-none text-reset mb-2">
    <div class="bg-black-50 h-100 d-flex">
        <div class="h-100 bg-orange" style="width: 5px;"></div>
        <div class="flex-fill py-2 px-3">
            <i class="{{ $icon }} fa-fw mr-2 text-orange"></i>
            {{ $slot }}
        </div>
    </div>
</a>
