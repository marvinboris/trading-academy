@extends('layouts.admin')

@section('section', 'Admins')
@section('title', 'Edit an Admin')

@section('content')
@component('components.auth.pages.admin.page')
<form action="{{ route('admin.users.admins.update', $admin->id) }}" method="post">
    <div class="row">
        <div class="col-lg-9">
            @if (count($errors->all()) > 0)
                <div class="alert alert-danger">
                    <ul class="pb-0 mb-0">
                        @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            @method('PATCH')
            <div class="row">
                @component('components.ui.admin.form-group', ['id' => 'name', 'type' => 'text', 'required' => 'required', 'class' => 'col-6 pr-1', 'icon' => 'fas fa-user', 'name' => 'name', 'placeholder' => 'Name']) value="{{ old('name') ?? $admin->name }}" @endcomponent
                <div class="form-group col-6 pl-1">
                    <label for="phone" class="control-label">Phone Number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text border-0 rounded-0 bg-white">
                                <label for="phone" class="m-0"><i class="fas fa-phone fa-fw"></i></label>
                            </div>
                        </div>
                        <input id="phone" type="tel" class="form-control text-fa border-0 bg-white py-4 px-3 @error('phone') border is-invalid @enderror" name="phone" value="{{ old('phone') ?? $admin->phone }}" placeholder="{{ __('Phone Number') }}" required autocomplete="phone">
                    </div>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @component('components.ui.admin.form-group', ['id' => 'email', 'type' => 'email', 'required' => 'required', 'class' => 'col-6 pr-1', 'icon' => 'fas fa-at', 'name' => 'email', 'placeholder' => 'E-Mail Address']) value="{{ old('email') ?? $admin->email }}" @endcomponent
                <div class="form-group col-6 pl-1">
                    <label for="is_active" class="control-label">Status</label>
                    <div class="d-flex">
                        <div class="custom-control custom-radio col-6">
                            <input type="radio" id="inactive" name="is_active" {{ $admin->is_active === 0 ? 'checked' : '' }} class="custom-control-input" value="0">
                            <label class="custom-control-label" for="inactive">Inactive</label>
                        </div>
                        <div class="custom-control custom-radio col-6">
                            <input type="radio" id="active" name="is_active" {{ $admin->is_active === 1 ? 'checked' : '' }} class="custom-control-input" value="1">
                            <label class="custom-control-label" for="active">Active</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="password alert alert-danger d-none">
                        <div class="row">
                            <div id="uppercase" class="text-purered col-sm-6"><i class="fas fa-times-circle text-x-small"></i> {!! 'uppercase' !!}</div>
                            <div id="lowercase" class="text-purered col-sm-6"><i class="fas fa-times-circle text-x-small"></i> {!! 'lowercase' !!}</div>
                            <div id="number" class="text-purered col-sm-6"><i class="fas fa-times-circle text-x-small"></i> {!! 'number' !!}</div>
                            <div id="special" class="text-purered col-sm-6"><i class="fas fa-times-circle text-x-small"></i> {!! 'special' !!}</div>
                            <div id="minimum" class="text-purered col-sm-6"><i class="fas fa-times-circle text-x-small"></i> {!! 'minimum' !!}</div>
                            <div id="confirm" class="text-purered col-sm-6"><i class="fas fa-times-circle text-x-small"></i> {!! 'confirm' !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-lg-3">
            <div class="text-center text-montserrat px-3">
                <div><button class="btn btn-block btn-green font-weight-bold mb-3">Save</button></div>
                <div><a href="route" class="btn btn-block btn-orange font-weight-bold">Cancel</a></div>
            </div>
        </div>
    </div>
</form>
@endcomponent
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#country').change(function () {
                const current = $(this);
                const value = current.val();
                const country = current.find('option:selected').attr('country');
                $('#code').val(value);
                $('#country-code').val(country);
            });
            
            const passwordBlock = $('.password.alert');

            passwordBlock.hide().removeClass('d-none');
            
            $('#password').keyup(function () {
                passwordBlock.slideDown();

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

                const uppercaseTest = uppercaseRegex.test(value);
                const lowercaseTest = lowercaseRegex.test(value);
                const numberTest = numberRegex.test(value);
                const specialTest = specialRegex.test(value);
                const minimumTest = value.length > 7;
                const confirmTest = value === $('#password-confirmation').val();

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

            $('#password').change(function () {
                $('#password').keyup();
            });

            $('#password-confirmation').keyup(function () {
                $('#password').keyup();
            });

            $('#password-confirmation').change(function () {
                $('#password').keyup();
            });

            $('form').submit(function (e) {
                if ($('.password.alert').hasClass('alert-danger')) e.preventDefault();
            });
        });
    </script>
@endsection