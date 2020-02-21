@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-between full-height-app py-5">
        <div class="col-md-6">
            <div class="position-relative">
                <img src="{{ asset('images/Groupe 157.png') }}" alt="First pic sign in" class="img-fluid">
            </div>
        </div>
        <div class="col-md-5">
            @if (Session::has('not_verified'))
            @if (Session::has('new_registered'))
            <div class="alert alert-info">{{ Session::get('not_verified') }}</div>
            @else
            <div class="alert alert-danger">{{ Session::get('not_verified') }}</div>
            @endif
            @endif
            @if (Session::has('activated'))
            <div class="alert alert-success">{{ Session::get('activated') }}</div>
            @endif
            <h1 class="text-center text-montserrat font-weight-bold mb-3 text-green">Sign In</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                @component('components.ui.form-group', ['id' => 'email', 'type' => 'email', 'required' => 'required', 'class' => '', 'icon' => 'fas fa-at', 'name' => 'email', 'placeholder' => 'E-Mail Address', 'message' => $message ?? '']) value="{{ old('email') }}" @endcomponent
                @component('components.ui.form-group', ['id' => 'password', 'type' => 'password', 'required' => 'required', 'class' => '', 'icon' => 'fas fa-key', 'name' => 'password', 'placeholder' => 'Password', 'message' => $message ?? '']) value="{{ old('password') }}" @endcomponent

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-green btn-block font-weight-bold">
                        {{ __('Sign In') }}
                        <i class="fas fa-sign-in-alt ml-2"></i>
                    </button>
                </div>

                <div class="form-group">
                    @if (Route::has('password.request'))
                        <a class="text-green" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password ?') }}
                        </a>
                    @endif
                    @if (Route::has('register'))
                        Have no account ?
                        <a class="text-green" href="{{ route('register') }}">
                            {{ __('Sign Up') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
