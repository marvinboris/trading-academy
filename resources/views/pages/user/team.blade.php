@extends('layouts.user')

@section('section', 'Team')
@section('title', 'Team')

@section('content')
@component('components.auth.page')
@component('components.auth.pages.list', $data)
@endcomponent
@endcomponent
@endsection
