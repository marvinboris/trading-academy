@extends('layouts.app')

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
        <div class="col-md-10 col-lg-7">
            <div class="w-100 mb-3">
                <h1 class="text-montserrat font-weight-bold text-green">
                    {!! $content['contact_info']['title'] !!}
                </h1>
                <div class="border-top pt-3 text-montserrat mt-3">
                    <div class="row">
                        <div class="col-lg-4 d-flex">
                            <div class="pr-2">
                                <i class="fas fa-fw fa-street-view"></i>
                            </div>
                            <div>
                                Pharmacie les Glycines, New Bell
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex">
                            <div class="pr-2">
                                <i class="fas fa-fw fa-mobile-alt"></i>
                            </div>
                            <div>
                                +237 655 888 468
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex">
                            <div class="pr-2">
                                <i class="far fa-fw fa-paper-plane"></i>
                            </div>
                            <div>
                                <a href="mailto:contact@liyeplimal.net" class="text-reset">contact@liyeplimal.net</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <iframe width="100%" height="300" src="https://maps.google.com/maps?width=700&amp;height=300&amp;hl=en&amp;q=La%20maison%20du%20bitcoin+(Auto-%C3%A9cole%20Universit%C3%A9)&amp;ie=UTF8&amp;t=&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
        <div class="col-md-10 col-lg-5">
            <div class="">
                <div class="text-montserrat h1 font-weight-bold text-green">
                    {!! $content['message_us']['title'] !!}
                </div>
                <div class="border-top pt-3 mt-3">
                    <form action="" method="post">
                        <div class="row">
                            @component('components.ui.form-group', ['id' => 'name', 'type' => 'text', 'required' => 'required', 'class' => 'col-md-6 col-lg-12', 'icon' => 'fas fa-user', 'name' => 'name', 'placeholder' => $content['message_us']['form']['name']]) @endcomponent
                            @component('components.ui.form-group', ['id' => 'email', 'type' => 'email', 'required' => 'required', 'class' => 'col-md-6 col-lg-12', 'icon' => 'fas fa-at', 'name' => 'email', 'placeholder' => $content['message_us']['form']['email']]) @endcomponent
                            @component('components.ui.form-group', ['id' => 'subject', 'type' => 'text', 'required' => 'required', 'class' => ' col-lg-12', 'icon' => 'fas fa-book', 'name' => 'subject', 'placeholder' => $content['message_us']['form']['subject']]) @endcomponent
                            @component('components.ui.form-group', ['id' => 'message', 'type' => 'textarea', 'required' => 'required', 'class' => ' col-lg-12', 'icon' => 'fas fa-envelope', 'name' => 'message', 'placeholder' => $content['message_us']['form']['message']]) @endcomponent

                            <div class="col-12 form-group">
                                <button class="border-0 p-0 btn-animate" href="#">
                                    <div class="btn btn-lg btn-green primary pd-x-0 overflow-hidden rounded-sm static link text-montserrat position-relative">
                                        <span class="d-block text-x-large py-1 pd-x-3">{{ __($content['message_us']['form']['submit']) }}</span>
                                        <div class="bg-darkblue secondary align-items-center d-none active rounded-sm-right px-3 py-2 position-absolute h-100" style="top: 0; right: 0;">
                                            <i class="fas fa-lg fa-arrow-alt-circle-right"></i>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endcomponent
@endsection
