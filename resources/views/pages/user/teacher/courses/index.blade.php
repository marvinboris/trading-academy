@extends('layouts.user')

@section('section', 'Courses')
@section('title', 'My Courses')

@section('content')
@component('components.auth.page')
@component('components.auth.pages.index', $data)
@endcomponent
@endcomponent
@endsection