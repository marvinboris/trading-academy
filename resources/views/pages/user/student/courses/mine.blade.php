@extends('layouts.user')

@section('section', 'Finance')
@section('title', 'My Courses')

@section('content')
@component('components.auth.page')
@component('components.auth.content.table', $data)
@endcomponent
@endcomponent
@endsection