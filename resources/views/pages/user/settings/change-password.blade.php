@extends('layouts.user')

@section('section', 'Settings')
@section('title', 'Change password')

@section('content')
@component('components.auth.page')
<form action="{{ route('user.settings.profile.post') }}" class="d-flex justify-content-center align-items-center" method="post">
    @csrf
    <div class="card w-100">
        <div class="card-body">
            <div class="form-group">
                <label for="old-password" class="control-label">Old password</label>
                <input type="password" required class="form-control" name="old_password" id="old-password">
            </div>
            <div class="form-group">
                <label for="new-password" class="control-label">New password</label>
                <input type="password" required class="form-control" name="new_password" id="new-password">
            </div>
            <div class="form-group">
                <label for="new-password-confirmation" class="control-label">Confirm new password</label>
                <input type="password" required class="form-control" name="new_password_confirmation" id="new-password-confirmation">
            </div>
            <div class="form-group">
                <div class="password alert alert-danger">
                    <div class="row">
                        <div id="uppercase" class="text-purered col-sm-6 col-md-4"><i class="fas fa-times-circle text-x-small"></i> An uppercase letter</div>
                        <div id="lowercase" class="text-purered col-sm-6 col-md-4"><i class="fas fa-times-circle text-x-small"></i> A lowercase letter</div>
                        <div id="number" class="text-purered col-sm-6 col-md-4"><i class="fas fa-times-circle text-x-small"></i> A number</div>
                        <div id="special" class="text-purered col-sm-6 col-md-4"><i class="fas fa-times-circle text-x-small"></i> A special character</div>
                        <div id="minimum" class="text-purered col-sm-6 col-md-4"><i class="fas fa-times-circle text-x-small"></i> At least 8 characters</div>
                        <div id="confirm" class="text-purered col-sm-6 col-md-4"><i class="fas fa-times-circle text-x-small"></i> Confirm password</div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-green">Change</button>
            </div>
        </div>
    </div>
</form>
@endcomponent
@endsection

@section('scripts')
<script>
    $(function () {
        $('#new-password').keyup(function () {
            const current = $(this);
            const value = current.val();

            const uppercaseRegex = /[A-Z]/g;
            const lowercaseRegex = /[a-z]/g;
            const numberRegex = /[0-9]/g;
            const specialRegex = /[!@#\$%\^\&*\)\(+=._-]/g;

            const uppercase = $('#uppercase');
            const lowercase = $('#lowercase');
            const number = $('#number');
            const special = $('#special');
            const minimum = $('#minimum');
            const confirm = $('#confirm');

            const passwordBlock = $('.password.alert');

            const uppercaseTest = uppercaseRegex.test(value);
            const lowercaseTest = lowercaseRegex.test(value);
            const numberTest = numberRegex.test(value);
            const specialTest = specialRegex.test(value);
            const minimumTest = value.length > 7;
            const confirmTest = value === $('#new-password-confirmation').val();

            if (uppercaseTest && lowercaseTest && numberTest && specialTest && minimumTest && confirmTest) passwordBlock.removeClass('alert-danger').addClass('alert-success');
            else passwordBlock.removeClass('alert-success').addClass('alert-danger');

            if (uppercaseTest) uppercase.removeClass('text-purered').addClass('text-green').find('.fas').removeClass('fa-times-circle').addClass('fa-check-circle');
            else uppercase.addClass('text-purered').removeClass('text-green').find('.fas').addClass('fa-times-circle').removeClass('fa-check-circle');

            if (lowercaseTest) lowercase.removeClass('text-purered').addClass('text-green').find('.fas').removeClass('fa-times-circle').addClass('fa-check-circle');
            else lowercase.addClass('text-purered').removeClass('text-green').find('.fas').addClass('fa-times-circle').removeClass('fa-check-circle');

            if (numberTest) number.removeClass('text-purered').addClass('text-green').find('.fas').removeClass('fa-times-circle').addClass('fa-check-circle');
            else number.addClass('text-purered').removeClass('text-green').find('.fas').addClass('fa-times-circle').removeClass('fa-check-circle');

            if (specialTest) special.removeClass('text-purered').addClass('text-green').find('.fas').removeClass('fa-times-circle').addClass('fa-check-circle');
            else special.addClass('text-purered').removeClass('text-green').find('.fas').addClass('fa-times-circle').removeClass('fa-check-circle');

            if (minimumTest) minimum.removeClass('text-purered').addClass('text-green').find('.fas').removeClass('fa-times-circle').addClass('fa-check-circle');
            else minimum.addClass('text-purered').removeClass('text-green').find('.fas').addClass('fa-times-circle').removeClass('fa-check-circle');
            
            if (confirmTest) confirm.removeClass('text-purered').addClass('text-green').find('.fas').removeClass('fa-times-circle').addClass('fa-check-circle');
            else confirm.addClass('text-purered').removeClass('text-green').find('.fas').addClass('fa-times-circle').removeClass('fa-check-circle');
        });

        $('#new-password-confirmation').keyup(function () {
            $('#new-password').keyup();
        });

        $('form').submit(function (e) {
            if ($('.password.alert').hasClass('alert-danger')) e.preventDefault();
        });
    });
</script>
@endsection