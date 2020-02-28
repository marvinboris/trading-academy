@extends('layouts.user')

@section('section', 'Courses')
@section('parent') <a href="{{ route('student.courses.mine') }}" class="text-green text-900">My Courses</a> @endsection
@section('title', 'Show Course')

@section('content')
@component('components.auth.page')
@component('components.auth.content.table', $data)
@endcomponent
@endcomponent
@endsection