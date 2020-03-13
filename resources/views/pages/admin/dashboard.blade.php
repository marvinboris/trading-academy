@extends('layouts.admin')

@section('section', 'Admin Panel')
@section('title', 'Dashboard')

@section('content')
@component('components.auth.pages.admin.page')
    
@endcomponent
@endsection