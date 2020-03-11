@extends('layouts.app')

@php
    $jsonString = file_get_contents(base_path('content.json'));
    $contentFile = json_decode($jsonString, true);
    $content = $contentFile['pages'][Session::get('lang')]['frontend']['pages']['sign_in'];
@endphp

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-between full-height-app py-5">
        <div class="col-md-6">
            <div class="position-relative">
                <img src="{{ asset($content['img']) }}" alt="First pic sign in" class="img-fluid">
            </div>
        </div>
        <div class="col-md-5">
            @if (Session::has('not_verified'))
            @if (Session::has('new_registered'))
            <div class="alert alert-info">{!! Session::get('not_verified') !!}</div>
            @else
            <div class="alert alert-danger">{!! Session::get('not_verified') !!}</div>
            @endif
            @endif
            @if (Session::has('activated'))
            <div class="alert alert-success">{!! Session::get('activated') !!}</div>
            @endif
            @if (Session::has('already_verified'))
            <div class="alert alert-info">{!! Session::get('already_verified') !!}</div>
            @endif
            @if (Session::has('inactive'))
            <div class="alert alert-danger">{!! Session::get('inactive') !!}</div>
            @endif

            @if (count($errors->all()) > 0)
                <div class="alert alert-danger">
                    <ul class="mb-0 pb-0">
                        @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="text-center text-montserrat font-weight-bold mb-3 text-green">{!! $content['title'] !!}</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                @component('components.ui.form-group', ['id' => 'email', 'type' => 'email', 'required' => 'required', 'class' => '', 'icon' => 'fas fa-at', 'name' => 'email', 'placeholder' => $content['form']['email'], 'message' => $message ?? '']) value="{{ old('email') }}" @endcomponent
                @component('components.ui.form-group', ['id' => 'password', 'type' => 'password', 'required' => 'required', 'class' => '', 'icon' => 'fas fa-key', 'name' => 'password', 'placeholder' => $content['form']['password'], 'message' => $message ?? '']) value="{{ old('password') }}" @endcomponent

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">{{ __($content['form']['remember']) }}</label>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-green btn-block py-3 font-weight-bold">
                                {{ __($content['form']['sign_in']) }}
                                <i class="fas fa-sign-in-alt ml-2"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            @if (Route::has('password.request'))
                                <a class="text-green" href="{{ route('password.request') }}">
                                    {{ __($content['form']['text']['forgot'] . ' ?') }}
                                </a>
                            @endif
                            @if (Route::has('register'))
                                {!! $content['form']['text']['have'] !!} ?
                                <a class="text-green" href="{{ route('register') }}">
                                    {{ __($content['form']['text']['sign_up']) }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
