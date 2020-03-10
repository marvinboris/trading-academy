@extends('layouts.user')

@section('section', 'Finance')
@section('title', 'Transfer List')

@section('content')
@component('components.auth.page')
@component('components.auth.pages.list', $data)
@endcomponent
@endcomponent
@endsection
