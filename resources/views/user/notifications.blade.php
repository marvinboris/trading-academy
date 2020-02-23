@extends('layouts.user')

@section('section', 'Notifications')
@section('title', 'Notifications')

@section('content')
@component('components.auth.page')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <i class="fas fa-4x text-orange fa-bell mr-2"></i>
                <div class="text-montserrat">
                    <div class="text-700 h4">{{ Auth::user()->name() }}</div>
                    <div class="text-medium">Notifications</div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex">
        @foreach ($data as $item)
            @component('components.auth.content.notification', $item)
                {!! $item['content'] !!}
            @endcomponent
        @endforeach
    </div>
</div>
@endcomponent
@endsection