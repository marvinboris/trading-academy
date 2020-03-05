<div class="row" {!! ($hidden ?? false) ? 'style="left: -100%; position: absolute;"' : '' !!}>
    <div class="col-md-{{ $size  }}">
        <label for="{{ $name }}" class="control-label">{{ $label }}</label>
    </div>
    <div class="col-md-{{ 12 - $size }}">
        <div class="custom-file">
            <input type="file" name="{{ $name }}" id="{{ $name }}" class="custom-file-input" {{ $required ?? '' }}>
            <label for="{{ $name }}" class="custom-file-label">Choose {{ $label }}</label>
        </div>
    </div>
    
</div>
