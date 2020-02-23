<div>
    <div class="pb-1 border-bottom bg-black-10">
        <div class="pt-3 pb-3 pl-3 pr-5 d-flex justify-content-between align-items-center">
            <strong class="d-inline-flex align-items-center text-montserrat-alt pl-5">
                <div class="pl-5">@yield('title')</div>
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
    
    <div class="py-4 px-4 position-relative">
        <div class="px-0">
            {{ $slot }}
        </div>
    </div>
</div>