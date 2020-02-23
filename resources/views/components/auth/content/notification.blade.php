<a href="{{ route('user.notifications.show', $id) }}" class="col-12 text-decoration-none text-reset py-2 d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
        <i class="fa-2x fa-fw mr-2 {{ $icon }}"></i>
        <div>
            <div class="text-montserrat text-700 text-medium">{{ $title }}</div>
            <div class=" text-truncate overflow-hidden">
                {{ $slot }}
            </div>
        </div>
    </div>
    <div>
        {{ $datetime }}
    </div>
</a>