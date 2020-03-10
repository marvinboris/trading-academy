@extends('layouts.user')

@section('section', 'Commissions')
@section('title', 'Commissions')

@section('content')
@component('components.auth.page')
@component('components.auth.pages.list', $data)
@endcomponent
@endcomponent
@endsection
