<div class="container-fluid px-md-5 px-4 py-md-5 pt-3 pb-5 bg-{{ $bgColor }} text-{{ $fontColor }}">
    <div class="text-left px-md-5 {{ $title['text'] === '' ? 'd-none' : '' }}">
        <div class="text-{{ $title['color'] }} h1 text-montserrat text-700 pb-2 mb-2">
            {{ $title['text'] }}
        </div>
        <p class="border-top pt-3 d-inline-block">
            {{ $subtitle }}
        </p>
    </div>

    <div class="pt-4 px-md-5">
        {{ $slot }}
    </div>
</div>
