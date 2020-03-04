@extends('layouts.admin')

@section('section', 'About User')
@section('title', 'Cancelled Verifications')

@section('content')
@component('components.auth.pages.admin.page')
@component('components.auth.content.table', $data)
@endcomponent
@endcomponent
@endsection