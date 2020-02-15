@extends('layouts.app')

@section('content')
@component('components.banner', ['intro' => 'Contact', 'title' => 'Crypto Trading<br>courses here'])
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
        <div class="col-lg-12">
            <h1 class="text-allexist text-green">
                Contact information
            </h1>
            <div class="border-top pt-3 mt-3">
                <div class="row">
                    <div class="col-lg-4 d-flex">
                        <div class="pr-2">
                            <i class="fas fa-street-view fa-2x"></i>
                        </div>
                        <div>
                            1135, Rue Mandessi Bell Bali,<br>
                            Between Carrefour Kayo Elie
                            and Montagne Manga Bell,
                            Douala Cameroon
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-4 d-flex">
                                <div class="pr-2">
                                    <i class="fas fa-mobile-alt fa-2x"></i>
                                </div>
                                <div>
                                    +237 655 888 468
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex">
                                <div class="pr-2">
                                    <i class="far fa-paper-plane fa-2x"></i>
                                </div>
                                <div>
                                    <a href="mailto:contact@liyeplimal.net" class="text-reset">contact@liyeplimal.net</a>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex">
                                <div class="pr-2">
                                    <i class="fas fa-globe fa-2x"></i>
                                </div>
                                <div>
                                    <a href="https://www.liyeplimal.net" class="text-reset">www.liyeplimal.net</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4">
            <h1 class="text-allexist text-green">
                Message us
            </h1>
            <div class="border-top pt-3 mt-3">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-4 form-group">
                            <input type="text" class="form-control" required placeholder="Your name">
                        </div>
                        <div class="col-lg-4 form-group">
                            <input type="email" name="" id="" class="form-control" required placeholder="Your email address">
                        </div>
                        <div class="col-lg-4 form-group">
                            <input type="text" name="" id="" class="form-control" required placeholder="Subject">
                        </div>
                        <div class="col-12 form-group">
                            <textarea name="" id="" class="form-control" required placeholder="Your message"></textarea>
                        </div>
                        <div class="col-12 form-group">
                            <button class="btn btn-green">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 mt-4">
            <iframe width="100%" height="300" src="https://maps.google.com/maps?width=700&amp;height=300&amp;hl=en&amp;q=La%20maison%20du%20bitcoin+(Auto-%C3%A9cole%20Universit%C3%A9)&amp;ie=UTF8&amp;t=&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
    </div>
@endcomponent
@endsection