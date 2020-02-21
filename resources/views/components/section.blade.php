<div class="container-fluid px-md-5 px-4 py-5 bg-{{ $bgColor }} text-{{ $fontColor }}">
    <div class="text-left px-md-5 {{ $title['text'] === '' ? 'd-none' : '' }}">
        <h1 class="text-{{ $title['color'] }} text-montserrat text-700 pb-2 mb-2">
            {{ $title['text'] }}
        </h1>
        <p class="border-top pt-3 d-inline-block">
            {{ $subtitle }}
        </p>
    </div>

    <div class="pt-4 px-md-5">
        {{ $slot }}
    </div>
</div>