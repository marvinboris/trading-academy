@extends('layouts.admin')

@php
$phoneData = json_decode(file_get_contents('http://country.io/phone.json'), true);
$namesData = json_decode(file_get_contents('http://country.io/names.json'), true);
ksort($phoneData);
asort($namesData);
@endphp

@section('section', 'Students')
@section('title', 'Edit a Student')

@section('content')
@component('components.auth.pages.admin.page')
<form action="{{ route('admin.users.students.update', $student->id) }}" method="post" enctype="multipart/form-data">
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
                @component('components.ui.admin.form-group', ['id' => 'first-name', 'type' => 'text', 'required' => 'required', 'class' => 'col-6 pr-1', 'icon' => 'fas fa-user', 'name' => 'first_name', 'placeholder' => 'First Name']) value="{{ old('first_name') ?? $student->user->first_name }}" @endcomponent
                @component('components.ui.admin.form-group', ['id' => 'last-name', 'type' => 'text', 'required' => 'required', 'class' => 'col-6 pl-1', 'icon' => 'fas fa-user', 'name' => 'last_name', 'placeholder' => 'Last Name']) value="{{ old('last_name') ?? $student->user->last_name }}" @endcomponent
                <div class="form-group col-4 pr-1">
                    <label for="country" class="control-label">Country</label>
                    <div class="input-group">
                        <select id="country" name="country" class="form-control border-0 bg-white px-3" style="height: 3rem !important;">
                            <option>Select Country</option>
                            @foreach ($namesData as $key => $value)
                            <option value="{{ $phoneData[$key] }}" country="{{ $key }}" @if ((old('country') ?? $phoneData[$student->user->country]) === $phoneData[$key]) selected @endif>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input type="hidden" name="country_code" id="country-code" value="{{ old('country_code') ?? $student->user->country }}" required>
                <div class="form-group col-8 pl-1">
                    <label for="phone" class="control-label">Phone Number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text border-0 rounded-0 bg-white">
                                <label for="phone" class="m-0"><i class="fas fa-phone fa-fw"></i></label>
                            </div>
                        </div>
                        <div class="input-group-prepend">
                            <input type="text" id="code" name="code" class="input-group-text border-0 rounded-0 bg-white" value="{{ old('code') ?? $phoneData[$student->user->country] }}" style="width: 4rem;" placeholder="Code" readonly required>
                        </div>
                        <input id="phone" type="tel" class="form-control text-fa border-0 bg-white py-4 px-3 @error('phone') border is-invalid @enderror" name="phone" value="{{ old('phone') ?? substr($student->user->phone, strlen($phoneData[$student->user->country]), strlen($student->user->phone) - strlen($student->user->country)) }}" placeholder="{{ __('Phone Number') }}" required autocomplete="phone">
                    </div>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @component('components.ui.admin.form-group', ['id' => 'email', 'type' => 'email', 'required' => 'required', 'class' => 'col-6 pr-1', 'icon' => 'fas fa-at', 'name' => 'email', 'placeholder' => 'E-Mail Address']) value="{{ old('email') ?? $student->user->email }}" @endcomponent

                <div class="form-group col-6 pr-1 position-absolute" style="left: -100%;">
                    <label for="photo" class="control-label">Photo</label>
                    <div class="custom-file border-0 rounded-0">
                        <input type="file" class="custom-file-input border-0 rounded-0" name="photo" id="photo">
                        <label class="custom-file-label rounded-0" for="photo">Choose file</label>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="is_active" class="control-label">Status</label>
                    <div class="d-flex">
                        <div class="custom-control custom-radio col-6">
                            <input type="radio" id="inactive" name="is_active" {{ (old('is_active') ?? $student->user->is_active) === 0 ? 'checked' : '' }} class="custom-control-input" value="0">
                            <label class="custom-control-label" for="inactive">Inactive</label>
                        </div>
                        <div class="custom-control custom-radio col-6">
                            <input type="radio" id="active" name="is_active" {{ (old('is_active') ?? $student->user->is_active) === 1 ? 'checked' : '' }} class="custom-control-input" value="1">
                            <label class="custom-control-label" for="active">Active</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-lg-3">
            <div class="p-4 bg-white border mb-3">
                <div class="border rounded-circle embed-responsive embed-responsive-1by1 mb-3" style="background: url({{ asset($student->user->photo ? $student->user->photo->path : '') }}) no-repeat center; background-size: cover;"></div>
                <div class="text-center">
                    <a href="#" id="upload" data-target="photo" class="text-green">Click to upload image</a>
                </div>
            </div>
            <div class="text-center text-montserrat px-3">
                <div><button class="btn btn-block btn-green font-weight-bold mb-3">Save</button></div>
                <div><a href="{{ route('admin.users.students.index') }}" class="btn btn-block btn-orange font-weight-bold">Cancel</a></div>
            </div>
        </div>
    </div>
</form>
@endcomponent
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#upload').click(function (e) {
                e.preventDefault();
                
                const targetName = $(this).attr('data-target');
                const target = $('label[for="' + targetName + '"]').parent().find('input');
                target.click();
            });
        });
    </script>
@endsection