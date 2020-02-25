@extends('layouts.admin')

@section('section', 'Authors')
@section('title', 'Authors list')

@section('content')
@component('components.auth.pages.admin.page')
@component('components.auth.pages.admin.index', $data)
@endcomponent
@endcomponent
@endsection