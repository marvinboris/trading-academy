@extends('layouts.app')

@section('content')
@component('components.banner', ['title' => 'Contact'])
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
        <div class="col-7">
            <div class="w-100 mb-3">
                <h1 class="text-montserrat font-weight-bold text-green">
                    Contact information
                </h1>
                <div class="border-top pt-3 text-montserrat mt-3">
                    <div class="row">
                        <div class="col-lg-3 d-flex">
                            <div class="pr-2">
                                <i class="fas fa-fw fa-street-view"></i>
                            </div>
                            <div>
                                Pharmacie les Glycines, New Bell
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex">
                            <div class="pr-2">
                                <i class="fas fa-fw fa-mobile-alt"></i>
                            </div>
                            <div>
                                +237 655 888 468
                            </div>
                        </div>
                        <div class="col-lg-3 pl-0 d-flex">
                            <div class="pr-2">
                                <i class="far fa-fw fa-paper-plane"></i>
                            </div>
                            <div>
                                <a href="mailto:contact@liyeplimal.net" class="text-reset">contact@liyeplimal.net</a>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex">
                            <div class="pr-2">
                                <i class="fas fa-fw fa-globe"></i>
                            </div>
                            <div>
                                <a href="https://www.liyeplimal.net" class="text-reset">www.liyeplimal.net</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <iframe width="100%" height="300" src="https://maps.google.com/maps?width=700&amp;height=300&amp;hl=en&amp;q=La%20maison%20du%20bitcoin+(Auto-%C3%A9cole%20Universit%C3%A9)&amp;ie=UTF8&amp;t=&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
        <div class="col-5">
            <div class="">
                <h1 class="text-montserrat font-weight-bold text-green">
                    Message us
                </h1>
                <div class="border-top pt-3 mt-3">
                    <form action="" method="post">
                        <div class="row">
                            @component('components.ui.form-group', ['id' => 'name', 'type' => 'text', 'required' => 'required', 'class' => 'col-12', 'icon' => 'fas fa-user', 'name' => 'name', 'placeholder' => 'Your name']) @endcomponent
                            @component('components.ui.form-group', ['id' => 'email', 'type' => 'email', 'required' => 'required', 'class' => 'col-12', 'icon' => 'fas fa-at', 'name' => 'email', 'placeholder' => 'Your email address']) @endcomponent
                            @component('components.ui.form-group', ['id' => 'subject', 'type' => 'text', 'required' => 'required', 'class' => 'col-12', 'icon' => 'fas fa-book', 'name' => 'subject', 'placeholder' => 'Subject']) @endcomponent
                            @component('components.ui.form-group', ['id' => 'message', 'type' => 'textarea', 'required' => 'required', 'class' => 'col-12', 'icon' => 'fas fa-envelope', 'name' => 'message', 'placeholder' => 'Your message']) @endcomponent
                            
                            <div class="col-12 form-group">
                                <button class="btn-group btn p-0 text-montserrat link text-decoration-none">
                                    <span class="btn btn-green btn-lg rounded-0 text-700 px-5 py-3">Submit</span>
                                    <div class="d-inline-flex justify-content-center align-items-center bg-darkblue text-white rounded-0 pr-3 pl-3">
                                        <i class="fas fa-fw fa-2x fa-arrow-alt-circle-right"></i>
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