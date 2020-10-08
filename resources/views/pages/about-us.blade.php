@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <meta name="description" content="Tout savoir sur GIT Trading Academy Cameroun." />
@endsection

@section('content')
    @component('components.banner', ['title' => $content['title']])
    @endcomponent
    @component('components.section', [
        'bgColor' => 'light',
        'fontColor' => 'dark',
        'title' => [
            'color' => 'green',
            'text' => ''
        ],
        'subtitle' => ''
    ])
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <h1 class="text-montserrat font-weight-bold text-green">
                    {!! $content['about']['title'] !!}
                </h1>
                <div class="border-top pt-3 mt-3">
                    {!! $content['about']['description'] !!}
                </div>
            </div>
            <div class="col-lg-5">
                <div class="p-2 rounded bg-white border shadow">
                    <img src="{{ asset($content['about']['img']) }}" alt="About Us under-banner" class="img-fluid shadow">
                </div>
            </div>
        </div>
    @endcomponent

    @component('components.section', [
        'bgColor' => 'green',
        'fontColor' => 'white',
        'title' => [
            'color' => 'white',
            'text' => ''
        ],
        'subtitle' => ''
    ])
        <div class="text-white text-montserrat h1 font-weight-bold">{!! $content['mission']['title'] !!}</div>
        <div class="pt-3 mt-3 border-top bborder-white-50">
            {!! $content['mission']['description'] !!}
        </div>
    @endcomponent

    @component('components.section', [
        'bgColor' => 'light',
        'fontColor' => 'dark',
        'title' => [
            'color' => 'green',
            'text' => ''
        ],
        'subtitle' => ''
    ])
        <div class="text-center text-montserrat h1 font-weight-bold text-green mb-5">
            <span class="pb-3 border-bottom">{!! $content['trainers']['title'] !!}</span>
        </div>
        <div class="w-75 mx-auto text-center">
            {!! $content['trainers']['description'] !!}
        </div>
        <div class="owl-carousel pt-3">
            @foreach ($trainersData as $trainer)
                @component('components.team', $trainer)
                @endcomponent
            @endforeach
        </div>
    @endcomponent
@endsection

@section('scripts')
    <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
    <script>
        $(function () {
            const owl = $(".owl-carousel");

            owl.on('initialized.owl.carousel', function () {
                const center = $('.owl-item.active.center');
                const owlItems = $('.owl-item');

                owlItems
                    .css({ opacity: .5, transform: 'scale(.7)' })
                    .find('.circle').css({ opacity: 0 });
                center
                    .css({ opacity: 1, transform: 'scale(.9)' })
                    .find('.details').css({ opacity: 1 });
                center
                    .find('.circle').css({ opacity: 1 });
            });

            owl.owlCarousel({ responsive: {0: {items: 1}, 600: {items: 2}, 800: {items: 3}, 1000: {items: 4}, 1200: {items: 5}}, loop: true, center: true, nav: true });

            owl.on('changed.owl.carousel', function () {
                const center = $('.owl-item.active.center');

                center
                    .css({ transform: 'scale(.7)' }).stop().animate({ opacity: .5 }, 'fast')
                    .find('.details').css({ opacity: 0 });
                center
                    .find('.circle').css({ opacity: 0 });

                setTimeout(() => {
                    const center = $('.owl-item.active.center');

                    center
                        .css({ transform: 'scale(.9)' }).stop().animate({ opacity: 1 }, 'fast')
                        .find('.details').animate({ opacity: 1 }, 'fast');
                    center
                        .find('.circle').animate({ opacity: 1 }, 'fast');
                }, 1);
            });
        });
    </script>
@endsection
