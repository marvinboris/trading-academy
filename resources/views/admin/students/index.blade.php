@extends('layouts.admin')

@section('section', 'Students')
@section('title', 'Students list')

@section('content')
@component('components.auth.pages.admin.page')
@component('components.auth.pages.admin.index', $data)
@endcomponent
@endcomponent
@endsection