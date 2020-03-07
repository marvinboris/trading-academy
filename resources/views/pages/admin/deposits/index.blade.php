@extends('layouts.admin')

@section('section', 'Deposits')
@section('title', 'Deposits list')

@section('content')
@component('components.auth.pages.admin.page')
@component('components.auth.pages.admin.index', $data)
@endcomponent
@endcomponent
@endsection