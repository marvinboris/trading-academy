@extends('layouts.user')

@section('section', 'Team')
@section('title', 'Team')

@section('content')
@component('components.auth.page')
@component('components.auth.content.table', $data)
@endcomponent
@endcomponent
@endsection