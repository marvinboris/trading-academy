@extends('layouts.admin')

@section('section', 'Admins')
@section('title', 'Admins list')

@section('content')
@component('components.auth.pages.admin.page')
@component('components.auth.pages.admin.index', $data)
@endcomponent
@endcomponent
@endsection