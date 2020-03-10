<div class="row">
    <div class="col-md-{{ $size ?? 12 }}">
        <label for="{{ $name }}" class="control-label">{{ $label }}</label>
    </div>
    <div class="col-md-{{ $size ? 12 - $size : 12 }}">
        <div class="row m-0">
            @foreach ($list as $key => $item)
                <div class="col-6 col-md-4 col-lg-3 custom-control custom-radio">
                    <input type="radio" name="{{ $name }}" class="custom-control-input" id="{{ $name }}_{{ $value($item) }}" value="{{ $value($item) }}">
                    <label for="{{ $name }}_{{ $value($item) }}" class="custom-control-label">{{ $unit_name($item) }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
