@extends('layouts.admin')

@section('section', 'Blog')
@section('title', 'My Posts')

@section('content')
@component('components.auth.page')
@component('components.auth.pages.index', $data)
@endcomponent
@endcomponent
@endsection