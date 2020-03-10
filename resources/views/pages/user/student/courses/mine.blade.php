@extends('layouts.user')

@section('section', 'Finance')
@section('title', 'My Courses')

@section('content')
@component('components.auth.page')
@component('components.auth.pages.list', $data)
@endcomponent
@endcomponent
@endsection
