@extends('layouts.admin')

@section('section', 'Photos')
@section('title', 'Photos list')

@section('content')
@component('components.auth.pages.admin.page')
@component('components.auth.pages.admin.index', $data)
@endcomponent
@endcomponent
@endsection