@extends('layouts.app')

@php
$phoneData = json_decode(file_get_contents('http://country.io/phone.json'), true);
$namesData = json_decode(file_get_contents('http://country.io/names.json'), true);
ksort($phoneData);
asort($namesData);
@endphp

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-between full-height-app py-5">
        <div class="col-md-5">
            @if (count($errors->all()) > 0)
                <div class="alert alert-danger">
                    <ul class="pb-0 mb-0">
                        @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="text-center text-montserrat font-weight-bold mb-3 text-green">Sign Up</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row">
                    @component('components.ui.form-group', ['id' => 'first-name', 'type' => 'text', 'required' => 'required', 'class' => 'col-6 pr-1', 'icon' => 'fas fa-user', 'name' => 'first_name', 'placeholder' => 'First Name']) value="{{ old('first_name') }}" @endcomponent
                    @component('components.ui.form-group', ['id' => 'last-name', 'type' => 'text', 'required' => 'required', 'class' => 'col-6 pl-1', 'icon' => 'fas fa-user', 'name' => 'last_name', 'placeholder' => 'Last Name']) value="{{ old('last_name') }}" @endcomponent
                    <div class="form-group col-4 pr-1">
                        <select id="country" name="country" class="form-control border-0 bg-black-10 h-100">
                            <option>Select your country</option>
                            @foreach ($namesData as $key => $value)
                            <option value="{{ $phoneData[$key] }}" @if (old('country') === $phoneData[$key]) selected @endif>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-8 pl-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0 rounded-0 bg-black-10">
                                    <label for="phone" class="m-0"><i class="fas fa-phone fa-fw"></i></label>
                                </div>
                            </div>
                            <div class="input-group-prepend">
                                <input type="text" id="code" name="code" class="input-group-text border-0 rounded-0 bg-black-10" value="{{ old('code') }}" style="width: 4rem;" placeholder="Code" readonly required>
                            </div>
                            <input id="phone" type="tel" class="form-control text-fa border-0 bg-black-10 py-4 px-3 @error('phone') border is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="{{ __('Phone Number') }}" required autocomplete="phone">
                        </div>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @component('components.ui.form-group', ['id' => 'email', 'type' => 'email', 'required' => 'required', 'class' => 'col-6 pr-1', 'icon' => 'fas fa-at', 'name' => 'email', 'placeholder' => 'E-Mail Address']) value="{{ old('email') }}" @endcomponent
                    @component('components.ui.form-group', ['id' => 'sponsor', 'type' => 'text', 'class' => 'col-6 pl-1', 'icon' => 'fas fa-user-friends', 'name' => 'sponsor', 'placeholder' => 'Sponsor ID']) @if (Request::query('ref')) readonly value="{{ Request::query('ref') }}" @else value="{{ old('sponsor') }}" @endif @endcomponent
                    @component('components.ui.form-group', ['id' => 'password', 'type' => 'password', 'required' => 'required', 'class' => 'col-6 pr-1', 'icon' => 'fas fa-key', 'name' => 'password', 'placeholder' => 'Password']) value="{{ old('password') }}" @endcomponent
                    @component('components.ui.form-group', ['id' => 'password-confirmation', 'type' => 'password', 'required' => 'required', 'class' => 'col-6 pl-1', 'icon' => 'fas fa-lock', 'name' => 'password_confirmation', 'placeholder' => 'Confirm Password']) value="{{ old('password_confirmation') }}" @endcomponent

                    <div class="form-group col-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="terms">{{ __('I have read and accepted Privacy policy and Terms and Conditions') }}</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="form-group col-6">
                                <button type="submit" class="btn btn-green btn-block py-3 font-weight-bold">
                                    {{ __('Register') }}
                                    <i class="fas fa-fw fa-user-plus mr-3"></i>
                                </button>
                            </div>

                            <div class="form-group col-6">
                                @if (Route::has('login'))
                                    <a class="text-green" href="{{ route('login') }}">
                                        {{ __('I already have an account.') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
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

@section('scripts')
<script>
    $(function () {
        $('#country').change(function () {
            const value = $(this).val();
            $('#code').val(value);
        });
    });
</script>
@endsection
