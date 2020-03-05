<div class="row">
    <div class="col-md-{{ $size }}">
        <label for="{{ $name }}" class="control-label">{{ $label }}</label>
    </div>
    <div class="col-md-{{ 12 - $size }}">
        <input type="{{ $type }}" class="form-control text-fa text-900" value="{{ $value ?? '' }}" name="{{ $name }}" id="{{ $name }}" placeholder="{!! $placeholder !!}" {{ $required ?? '' }}>
    </div>
</div>