<div>
    <a href="#dropdown-item-{{ $name }}" class="sidebar-link btn btn-darkblue text-left d-block @if (strpos(url()->current(), $link) !== false) border-0 active @else border-0 @endif text-decoration-none text-reset p-0" data-toggle="collapse" style="box-shadow: none !important;">
        <div class="h-100 d-flex @if (strpos(url()->current(), $link) !== false) py-2 bg-yellow-33 @endif align-items-center pr-3">
            <div class="h-100 bg-orange" style="width: 5px;"></div>
            <div class="flex-fill py-2 px-3">
                <i class="{{ $icon }} fa-fw mr-2 text-yellow"></i>
                {{ $title }}
            </div>
            <i class="fas fa-caret-down"></i>
        </div>
    </a>
    <div class="collapse @if (strpos(url()->current(), $link) !== false)) show @endif bg-yellow-10 border-gray border-top border-thin pl-4" data-parent="#admin-aside-content" id="dropdown-item-{{ $name }}">
        <div class="border-white-20 border-left text-small">
            {{ $slot }}
        </div>
    </div>
</div>