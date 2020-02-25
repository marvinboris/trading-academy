@extends('layouts.admin')

@section('section', 'Documents')
@section('title', 'Documents list')

@section('content')
@component('components.auth.pages.admin.page')
@component('components.auth.pages.admin.index', $data)
@endcomponent
@endcomponent
@endsection