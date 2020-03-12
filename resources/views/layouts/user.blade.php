@php
    $jsonString = file_get_contents(base_path('content.json'));
    $contentFile = json_decode($jsonString, true);
    $globalContent = $contentFile['global'];
@endphp

@include('includes.head')

<div class="d-flex min-vh-100 mw-100">
    @include('includes.auth.user.aside')
    <div class="flex-fill w-100 bg-white position-relative pb-4">
        @include('includes.auth.user.header')
        <div class="d-flex flex-column justify-content-between full-height-user">
            <main class="flex-fill">
                <div class="mw-100">
                    @yield('content')
                </div>
            </main>
            @include('includes.auth.user.footer')
        </div>
    </div>
</div>

@include('includes.foot')
