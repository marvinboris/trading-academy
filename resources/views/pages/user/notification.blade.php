@extends('layouts.user')

@section('section', 'Notifications')
@section('parent') <a href="{{ route('user.notifications') }}" class="text-green text-900">Notifications</a> @endsection
@section('title', 'Details')

@section('content')
@component('components.auth.page')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <i class="fa-3x fa-fw mr-2 {{ $data['icon'] }}"></i>
                <div>
                    <strong>From: Trading Academy</strong>
                    <div class="text-muted"><strong>Subject:</strong> {{ $data['title'] }}</div>
                </div>
            </div>
            <div class="text-right">
                <div>
                    <span class="badge badge-success">{{ $data['title'] }}</span>
                </div>
                <div>
                    {{ $data['datetime'] }}
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <span class="text-medium">Hi, <strong>{{ Auth::user()->name() }}</strong></span>
        <div class="pt-2">
            @include('notifications.shortcut')    
        </div>
    </div>
</div>
@endcomponent
@endsection