<div class="row">
    <div class="col-md-{{ $size }}">
        <label for="{{ $name }}" class="control-label">{{ $label }}</label>
    </div>
    <div class="col-md-{{ 12 - $size }}">
        <textarea class="form-control summernote" name="{{ $name }}" id="{{ $name }}" placeholder="{!! $placeholder !!}" {{ $required ?? '' }}>{{ $value ?? '' }}</textarea>
    </div>
</div>