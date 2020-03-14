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