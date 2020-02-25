<a href="{{ $link }}" class="sidebar-link btn btn-darkblue text-left @if (strpos(url()->current(), $link) !== false) border-0 active @else border-0 @endif p-0 d-block text-decoration-none text-reset" style="box-shadow: none !important;">
    <div class="h-100 @if (strpos(url()->current(), $link) !== false) py-2 bg-yellow-33 @endif d-flex">
        <div class="h-100 bg-orange" style="width: 5px;"></div>
        <div class="flex-fill py-2 pl-3 pr-3">
            <i class="{{ $icon }} fa-fw mr-2 text-yellow"></i>
            {{ $slot }}
        </div>
    </div>
</a>
