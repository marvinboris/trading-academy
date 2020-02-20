<div class="row">
    <label for="{{ $name }}" class="control-label col-{{ $size }}">{{ $label }}</label>
    <div class="col-{{ 12 - $size }} p-0">
        <textarea class="form-control summernote" name="{{ $name }}" id="{{ $name }}" placeholder="{!! $placeholder !!}" {{ $required or '' }}>{{ $value ?? '' }}</textarea>
    </div>
</div>