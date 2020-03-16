<div>
    <div class="pb-1 border-bottom bg-black-10">
        <div class="pt-3 pb-3 pl-3 pr-5 d-flex justify-content-between align-items-center">
            <strong class="d-inline-flex align-items-center text-montserrat-alt pl-2 pl-md-5">
                <div class="pl-2 pl-md-5">@yield('title')</div>
            </strong>
            <div>
                <ol class="breadcrumb bg-transparent m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-green text-900">Home</a></li>
                    @hasSection ('parent') <li class="breadcrumb-item" aria-current="page">@yield('parent')</li> @endif
                    <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="pb-3"></div>

    <div class="py-2 py-sm-4 px-4 position-relative">
        <div>
            @if (Session::has('info') || Session::has('success') || Session::has('danger'))
            <div id="normal-notifications-block" class="d-flex mb-3"></div>
            @endif
            @if (Session::has('new'))
            <div id="notifications-block" class="d-flex mb-3"></div>
            @endif
            {{ $slot }}
        </div>
    </div>
</div>

@section('notifications')
    
    @if (Session::has('info') || Session::has('success') || Session::has('danger'))
        @php
            $type = "";
            if (Session::has('info')) $type = 'info';
            if (Session::has('success')) $type = 'success';
            if (Session::has('danger')) $type = 'danger';
        @endphp
        <script>
            $(function () {
                const text = @json(Session::get($type));
                const type = @json($type);
                new Noty({
                    theme: 'metroui',
                    text,
                    type,
                    container: '#normal-notifications-block',
                    timeout: 5000
                }).show();
            });
        </script>
    @endif
@endsection