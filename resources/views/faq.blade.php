@extends('layouts.app')

@section('content')
@component('components.banner', ['title' => 'FAQ'])
@endcomponent

@component('components.section', [
    'bgColor' => 'light',
    'fontColor' => 'dark',
    'title' => [
        'color' => 'green',
        'text' => ''
    ],
    'subtitle' => ''
])

@endcomponent
@endsection
