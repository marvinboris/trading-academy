@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
@endsection

@section('content')
    @component('components.banner', ['title' => 'About Us'])
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
                    About Trading Academy
                </h1>
                <div class="border-top pt-3 mt-3">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolores ipsa explicabo, doloremque hic tempore nobis dolorum soluta sit repellat natus iste, praesentium sequi eius quidem et iusto quas assumenda ipsam?
                </div>
            </div>
            <div class="col-lg-5">
                <div class="p-2 rounded bg-white border shadow">
                    <img src="{{ asset('/images/germanys-2nd-largest-stock-exchange-stuttgart-solarisbank-make-zero-trading-fee-crypto-exchange-1600x900.jpg') }}" alt="About Us under-banner" class="img-fluid shadow">
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
        <h1 class="text-white text-montserrat font-weight-bold">Our Mission</h1>
        <div class="pt-3 mt-3 border-top bborder-white-50">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quod debitis, repellat pariatur adipisci ullam veniam quasi a doloremque autem ab culpa exercitationem nesciunt ad? Consectetur voluptas amet sed voluptatibus.
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
        <h1 class="text-center text-montserrat font-weight-bold text-green mb-5">
            <span class="pb-3 border-bottom">Trainers</span>
        </h1>
        <div class="w-75 mx-auto text-center">
            One thing you need to know about Global Investment Company is our satisfying customer service. Tagged with a young team of expert, we put all our effort together so you can get the best customer satisfaction experience out of our company.
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
                    .css({ opacity: .5, transform: 'scale(.8)' })
                    .find('.circle').css({ opacity: 0 });
                center
                    .css({ opacity: 1, transform: 'scale(1)' })
                    .find('.details').css({ opacity: 1 });
                center
                    .find('.circle').css({ opacity: 1 });
            });

            owl.owlCarousel({ items: 5, loop: true, center: true, nav: true });

            owl.on('changed.owl.carousel', function () {
                const center = $('.owl-item.active.center');

                center
                    .css({ transform: 'scale(.8)' }).stop().animate({ opacity: .5 }, 'fast')
                    .find('.details').css({ opacity: 0 });
                center
                    .find('.circle').css({ opacity: 0 });

                setTimeout(() => {
                    const center = $('.owl-item.active.center');

                    center
                        .css({ transform: 'scale(1)' }).stop().animate({ opacity: 1 }, 'fast')
                        .find('.details').animate({ opacity: 1 }, 'fast');
                    center
                        .find('.circle').animate({ opacity: 1 }, 'fast');
                }, 1);
            });
        });
    </script>
@endsection