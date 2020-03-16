<form action="{{ $action }}" class="overflow-hidden" method="{{ $method }}" @if ($file) enctype="multipart/form-data" @endif>
    @include('includes.form-errors')
    @csrf
    <div class="row justify-content-center">
        <div class="col-{{ $size }}">
            @foreach ($content as $item)
            <div class="row">
                <div class="form-group col-md-{{ $item['size'] }}">
                    @switch($item['type'])
                        @case('file')
                            @component('components.auth.content.form.file-input', $item['data']) @endcomponent
                            @break
                        @case('checkbox')
                            @component('components.auth.content.form.checkbox', $item['data']) @endcomponent
                            @break
                        @case('radio')
                            @component('components.auth.content.form.radio', $item['data']) @endcomponent
                            @break
                        @case('select')
                            @component('components.auth.content.form.select', $item['data']) @endcomponent
                            @break
                        @case('textarea')
                            @component('components.auth.content.form.textarea', $item['data']) @endcomponent
                            @break
                        @default
                            @component('components.auth.content.form.form-control', $item['data']) @endcomponent
                    @endswitch
                </div>
            </div>
            @endforeach
        </div>
        {{ $slot }}
    </div>
</form>
