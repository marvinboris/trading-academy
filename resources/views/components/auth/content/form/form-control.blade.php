<div class="row">
    <label for="{{ $name }}" class="control-label col-{{ $size }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control text-fa text-900 col-{{ 12 - $size }}" value="{{ $value ?? '' }}" name="{{ $name }}" id="{{ $name }}" placeholder="{!! $placeholder !!}" {{ $required ?? '' }}>
</div>