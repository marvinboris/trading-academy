@extends('layouts.empty')

@section('content')
<div class="container flex-fill d-flex flex-column">
    <div class="row flex-fill justify-content-between align-items-center">
        <div class="col-lg-6 order-1 order-md-0">
            <h4 class="text-white text-700 border-bottom border-thin border-white-20 pb-2 mb-3 text-montserrat">Sign In to <span class="text-yellow">Admin</span> Panel</h4>
            <div class="row">
                <div class="col-12 col-md-11">
                    <form action="" method="post">
                        @csrf

                        @component('components.ui.form-group', ['dark' => 'text-white', 'id' => 'email', 'type' => 'email', 'required' => 'required', 'class' => '', 'icon' => 'fas fa-at', 'name' => 'email', 'placeholder' => 'E-Mail Address']) value="{{ old('email') }}" @endcomponent
                        @component('components.ui.form-group', ['dark' => 'text-white', 'id' => 'password', 'type' => 'password', 'required' => 'required', 'class' => '', 'icon' => 'fas fa-key', 'name' => 'password', 'placeholder' => 'Password']) value="{{ old('password') }}" @endcomponent

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
        <div class="col-lg-6 order-0 order-md-1 px-5 px-md-0">
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