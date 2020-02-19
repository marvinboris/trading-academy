<label for="{{ $name }}" class="control-label col-{{ $size or 12 }}">{{ $label }}</label>
<div class="custom-file col-{{ $size ? 12 - $size : 12 }}">
    <input type="file" name="{{ $name }}" id="{{ $name }}" class="custom-file-input" required>
    <label for="{{ $name }}" class="custom-file-label">Choose {{ $label }}</label>
</div>
