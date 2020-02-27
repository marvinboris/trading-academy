@extends('layouts.user')

@section('section', 'Sessions')
@section('parent') <a href="{{ route('teacher.sessions.index') }}" class="text-green text-900">My Sessions</a> @endsection
@section('title', 'Edit a Session')

@section('content')
@component('components.auth.page')
@component('components.auth.pages.create', ['data' => $data])
@method('PATCH')
<div class="col-lg-3">
    <div class="text-center text-montserrat px-3">
        <div><button class="btn btn-block btn-green font-weight-bold mb-3">Save</button></div>
        <div><a href="route" class="btn btn-block btn-orange font-weight-bold">Cancel</a></div>
    </div>
</div>
@endcomponent
@endcomponent
@endsection
