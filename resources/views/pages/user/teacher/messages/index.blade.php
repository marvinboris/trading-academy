@extends('layouts.user')

@section('section', 'SMS')
@section('title', 'SMS List')

@section('content')
@component('components.auth.page')
@component('components.auth.content.table', $data)
@endcomponent
@endcomponent
@endsection