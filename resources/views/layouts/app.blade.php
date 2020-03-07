@php
    $jsonString = file_get_contents(base_path('content.json'));
    $contentFile = json_decode($jsonString, true);
    $globalContent = $contentFile['global'];
    $headerContent = $contentFile['pages'][Session::get('lang')]['frontend']['header'];
    $footerContent = $contentFile['pages'][Session::get('lang')]['frontend']['footer'];
@endphp

@include('includes.head')
@include('includes.app.header')

        <main class="position-relative full-height-app">
            @yield('content')
        </main>

@include('includes.app.footer')
@include('includes.foot')
