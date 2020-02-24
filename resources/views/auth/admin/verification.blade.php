@extends('layouts.empty')

@section('content')
<div class="container flex-fill d-flex flex-column">
    <div class="row flex-fill justify-content-between align-items-center">
        <div class="col-lg-6">
            <h4 class="text-white text-700 border-bottom border-thin border-white-20 pb-2 mb-3 text-montserrat">Enter your <span class="text-yellow">Verification</span> Code</h4>
            <div class="row">
                <div class="col-11">
                    <form action="" method="post">
                        @csrf

                        @component('components.ui.form-group', ['dark' => 'text-white', 'id' => 'code', 'type' => 'text', 'required' => 'required', 'class' => '', 'icon' => 'fas fa-code', 'name' => 'code', 'placeholder' => 'Verification code']) value="{{ old('code') }}" @endcomponent

                        <div class="row align-items-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-green btn-block py-3 font-weight-bold">
                                        {{ __('Sign In') }}
                                        <i class="fas fa-sign-in-alt ml-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('images/Groupe 196.png') }}" alt="First pic sign in" class="img-fluid">
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const doubleDigit = number => {
        if (number < 10) return '0' + number;
        return number;
    };

    setInterval(() => {
        const today = new Date();
        document.getElementById('date').innerHTML = `${doubleDigit(today.getHours())} : ${doubleDigit(today.getMinutes())} : ${doubleDigit(today.getSeconds())}`;
    }, 1000);
</script>
@endsection