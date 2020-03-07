@extends('layouts.user')

@section('section', 'Sessions')
@section('title', 'My Sessions')

@section('content')
@component('components.auth.page')
@component('components.auth.pages.index', $data)
@endcomponent
@endcomponent
@endsection