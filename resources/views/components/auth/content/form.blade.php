<form action="{{ $action }}" class="overflow-hidden" method="{{ $method }}" {{ $file ? 'enctype="application/x-www-form-urlencoded"' : '' }}>
    @csrf
    <div class="row">
        <div class="col-{{ $size }}">
            @foreach ($content as $item)
            <div class="row">
                <div class="form-group col-{{ $item['size'] }}">
                    @switch($item['type'])
                        @case('file')
                            @component('components.auth.content.file-input', $item['data']) @endcomponent
                            @break
                        @case('checkbox')
                            @component('components.auth.content.checkbox', $item['data']) @endcomponent
                            @break
                        @case('textarea')
                            @component('components.auth.content.textarea', $item['data']) @endcomponent
                            @break
                        @default
                            @component('components.auth.content.form-control', $item['data']) @endcomponent
                    @endswitch
                </div>
            </div>
            @endforeach
        </div>
        {{ $slot }}
    </div>
</form>
