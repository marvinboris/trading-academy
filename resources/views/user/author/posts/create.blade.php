@extends('layouts.admin')

@section('section', 'Blog')
@section('title', 'Add Post')

@section('content')
@component('components.auth.page')
@component('components.auth.pages.create', $data)
@endcomponent
@endcomponent
@endsection