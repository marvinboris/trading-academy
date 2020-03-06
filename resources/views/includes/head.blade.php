<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
        <link href="{{ asset('css/summernote-bs4.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('styles')

        <title>Trading Academy</title>
    </head>
    <body class="min-vh-100">
        <div id="app">
