<div class="row" {!! $hidden ? 'style="left: -100%; position: absolute;"' : '' !!}>
    <label for="{{ $name }}" class="control-label col-{{ $size  }}">{{ $label }}</label>
    <div class="custom-file col-{{ 12 - $size }}">
        <input type="file" name="{{ $name }}" id="{{ $name }}" class="custom-file-input" required>
        <label for="{{ $name }}" class="custom-file-label">Choose {{ $label }}</label>
    </div>
</div>
