@extends('layouts.admin')

@section('section', 'Expenses')
@section('title', 'Expenses list')

@section('content')
@component('components.auth.pages.admin.page')
@component('components.auth.pages.admin.index', $data)
@endcomponent
@endcomponent
@endsection