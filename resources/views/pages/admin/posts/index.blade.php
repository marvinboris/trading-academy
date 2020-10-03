@extends('layouts.admin')

@section('section', 'Blog')
@section('title', 'Posts list')

@section('content')
@component('components.auth.pages.admin.page')
@component('components.auth.pages.admin.index', $data)
@endcomponent
@endcomponent
@endsection