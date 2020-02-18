<a href="{{ $link }}" class="d-flex align-items-center text-decoration-none text-reset text-gray py-2">
    <div class="mr-2 text-white-50">-</div>
    <div class="@if (url()->current() === $link) font-weight-bold text-white @endif">{{ $name }}</div>
</a>