@extends('layouts.user')

@section('section', 'Settings')
@section('title', 'Edit language')

@section('content')
@component('components.auth.page')
<form action="{{ route('user.settings.edit-language.post') }}" class="d-flex justify-content-center align-items-center" method="post">
    @csrf
    <div class="card w-50">
        <div class="card-body">
            <div class="form-group">
                <label for="lang" class="control-label">Language</label>
                <select name="lang" class="form-control" id="lang">
                    @foreach ($languages as $language)
                    <option value="{{ $language->lang }}" {{ $selected === $language->lang ? 'selected' : '' }}>{{ $language->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-green">Update</button>
            </div>
        </div>
    </div>
</form>
@endcomponent
@endsection