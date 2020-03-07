@extends('layouts.admin')

@section('section', 'Teachers')
@section('title', 'Teachers list')

@section('content')
@component('components.auth.pages.admin.page')
@component('components.auth.pages.admin.index', $data)
@endcomponent
@endcomponent
@endsection