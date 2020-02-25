@extends('layouts.admin')

@section('section', 'Courses')
@section('title', 'Courses list')

@section('content')
@component('components.auth.pages.admin.page')
@component('components.auth.pages.admin.index', $data)
@endcomponent
@endcomponent
@endsection