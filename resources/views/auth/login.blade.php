@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-between py-5">
        <div class="col-md-6">
            <div class="position-relative">
                <img src="{{ asset('images/Groupe 157.png') }}" alt="First pic sign in" class="img-fluid">
            </div>
        </div>
        <div class="col-md-5">
            <h1 class="text-center text-montserrat font-weight-bold mb-3 text-green">Sign In</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text border-0 rounded-0 bg-black-10">
                                <label for="email" class="m-0"><i class="fas fa-fw fa-envelope"></i></label>
                            </div>
                        </div>
                        <input id="email" type="email" class="form-control text-fa border-0 bg-black-10 py-4 px-3 text-900 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email">
                    </div>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text border-0 rounded-0 bg-black-10">
                                <label for="password" class="m-0"><i class="fas fa-fw fa-key"></i></label>
                            </div>
                        </div>
                        <input id="password" type="password" class="form-control text-fa border-0 bg-black-10 py-4 px-3 text-900 @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                    </div>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

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
