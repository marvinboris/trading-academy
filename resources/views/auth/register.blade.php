@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-between py-5">
        <div class="col-md-5">
            <h1 class="text-center text-allexist mb-3 text-green">Sign Up</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <input id="name" type="text" class="form-control text-fa border-green text-900 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="&#xf007;   {{ __('Name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="email" type="email" class="form-control text-fa border-green text-900 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="&#xf0e0;   {{ __('E-Mail Address') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="phone" type="tel" class="form-control text-fa border-green text-900 @error('phone') is-invalid @enderror" name="phone" placeholder="&#xf095;   {{ __('Phone Number') }}" value="{{ old('phone') }}" required autocomplete="phone">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="sponsor" type="text" class="form-control text-fa border-green text-900 @error('sponsor') is-invalid @enderror" name="sponsor" placeholder="&#xf500;   {{ __('Sponsor ID') }}" @if (Request::query('ref')) readonly value="{{ Request::query('ref') }}" @else value="{{ old('sponsor') }}" @endif autocomplete="sponsor">

                    @error('sponsor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control text-fa border-green text-900 @error('password') is-invalid @enderror" name="password" placeholder="&#xf084;   {{ __('Password') }}" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control text-fa border-green text-900" name="password_confirmation" placeholder="&#xf09c;   {{ __('Confirm Password') }}" required autocomplete="new-password">
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }}>

                        <label class="form-check-label" for="terms">
                            {{ __('I have read and accepted Privacy policy and Terms and Conditions') }}
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-green btn-block font-weight-bold">
                        {{ __('Register') }}
                        <i class="fas fa-user-plus mr-3"></i>
                    </button>
                </div>

                <div class="form-group">
                    @if (Route::has('login'))
                        <a class="text-green" href="{{ route('login') }}">
                            {{ __('I already have an account.') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="position-relative">
                <img src="{{ asset('images/Groupe 196.png') }}" alt="First pic sign in" class="img-fluid">
            </div>
        </div>
    </div>
</div>
@endsection
