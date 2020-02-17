@include('includes.head')
<div class="d-flex min-vh-100">
    @include('includes.admin.aside')
    <div class="flex-fill">
        @include('includes.admin.header')
            <main>
                @yield('content')
            </main>
        @include('includes.admin.footer')
    </div>
</div>
@include('includes.foot')
