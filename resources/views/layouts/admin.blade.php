@include('includes.head')

<div class="d-flex min-vh-100">
    @include('includes.auth.admin.aside')
    <div class="flex-fill">
        @include('includes.auth.admin.header')
        <div class="d-flex flex-column justify-content-between full-height-user">
            <main class="bg-black flex-fill">
                @yield('content')
            </main>
            @include('includes.auth.admin.footer')
        </div>
    </div>
</div>

@include('includes.foot')
