@extends('layouts.admin')

@section('section', 'Sessions')
@section('title', 'Sessions list')

@section('content')
@component('components.auth.pages.admin.page')
@component('components.auth.pages.admin.index', $data)
@endcomponent
@endcomponent
@endsection