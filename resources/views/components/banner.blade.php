@php
    $jsonString = file_get_contents(base_path('content.json'));
    $contentFile = json_decode($jsonString, true);
    $globalContent = $contentFile['global'];
@endphp

<div class="py-4" style="background-image: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url('{{ asset($globalContent['banner']) }}'); background-size: cover; background-position: center;">
    <div class="w-75 py-3 position-relative mx-auto" style="transform: scale(.9); top: 10%;">
        <div class="mt-4">
            <div>
                <div class="text-center">
                    <div class="text-montserrat font-weight-bold text-white display-4 content py-4">
                        {!! $title !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>