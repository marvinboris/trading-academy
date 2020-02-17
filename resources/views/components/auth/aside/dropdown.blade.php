<div>
    <a href="#dropdown-item-{{ $name }}" class="d-flex align-items-center text-decoration-none text-reset pr-3 mb-2" data-toggle="collapse">
        <div class="h-100 bg-orange" style="width: 5px;"></div>
        <div class="flex-fill py-2 px-3">
            <i class="{{ $icon }} fa-fw mr-2 text-orange"></i>
            {{ $title }}
        </div>
        <i class="fas fa-caret-down"></i>
    </a>
    <div class="collapse bg-black-33 border-white border-top pl-4" id="dropdown-item-{{ $name }}">
        <div class="border-white border-left">
            {{ $slot }}
        </div>
    </div>
</div>