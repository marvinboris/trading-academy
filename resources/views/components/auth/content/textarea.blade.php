<label for="{{ $name }}" class="control-label col-{{ $size or 12 }}">{{ $label }}</label>
<textarea class="form-control col-{{ $size ? 12 - $size : 12 }}" name="{{ $name }}" id="{{ $name }}" {{ $required or '' }}></textarea>
