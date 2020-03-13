@php
    $jsonString = file_get_contents(base_path('content.json'));
    $contentFile = json_decode($jsonString, true);
    $globalContent = $contentFile['global'];
@endphp

@include('includes.head')
<div class="min-vh-100 bg-dark d-flex flex-column">
    <div class="container-fluid py-3 text-white border-bottom border-white-20 d-flex bg-dark justify-content-between align-items-center">
        <div>
            <a href="{{ url('/') }}" class="d-block position-sticky" style="top: 10px; height: 60px;">
                <img src="{{ asset($globalContent['logo']) }}" class="h-100" alt="Logo">
            </a>
        </div>
        <div class="text-montserrat text-700 text-right">
            <div class="text-white-50">DATE : {{ date('l d M Y') }}</div>
            <div><i class="fas fa-clock fa-fw mr-2 text-yellow"></i>TIME : <span id="date">{{ date('H : i : s') }}</span></div>
        </div>
    </div>

    <main class="d-flex flex-column py-5 py-md-0 flex-fill">
        @yield('content')
    </main>

    <footer class="container-fluid text-white text-center border-top border-white-20 bg-black-10 py-3">
        &copy; Copyright <strong class="text-yellow">Trading Academy</strong>. All Rights Reserved. Designed by <a href="mailto:jaris.ultio.21@gmail.com" class="font-weight-bold text-green text-decoration-none">Brainer 21 <i class="fas fa-code"></i></a>.
    </footer>
</div>
@include('includes.foot')
