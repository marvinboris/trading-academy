<div class="{{ $class }}">
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text border-0 rounded-0 bg-black-10">
                    <label for="{{ $id }}" class="m-0"><i class="{{ $icon }} fa-fw"></i></label>
                </div>
            </div>
            @switch($type)
                @case('textarea')
                <textarea id="{{ $id }}" class="form-control text-fa border-0 bg-black-10 py-4 px-3 @error($name) border is-invalid @enderror" name="{{ $name }}" placeholder="{{ __($placeholder) }}" {{ $required ?? '' }} autocomplete="{{ $name }}">{{ old($name) }}</textarea>
                    @break
                @case('select')
                    
                    @break
                @default
                    <input id="{{ $id }}" type="{{ $type }}" class="form-control text-fa border-0 bg-black-10 py-4 px-3 @error($name) border is-invalid @enderror" name="{{ $name }}" {{ $slot }} placeholder="{{ __($placeholder) }}" {{ $required ?? '' }} autocomplete="{{ $name }}">
            @endswitch
        </div>
    </div>
</div>
