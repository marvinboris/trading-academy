@extends('layouts.user')

@section('section', 'Documents')
@section('title', 'My Documents')

@section('content')
@component('components.auth.page')
@component('components.auth.pages.index', $data)
@endcomponent
@endcomponent
@endsection