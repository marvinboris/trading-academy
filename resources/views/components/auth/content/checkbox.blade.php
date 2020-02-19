<label for="{{ $name }}" class="control-label col-{{ $size or 12 }}">{{ $label }}</label>
<div class="row m-0 col-{{ $size ? 12 - $size : 12 }}">
    @foreach ($list as $item)
        <div class="col-6 col-md-4 col-lg-3 custom-control custom-checkbox">
            <input type="checkbox" name="{{ $name }}[]" class="custom-control-input" id="{{ $unit_name }}_{{ $item->{$id} }}" value="{{ $item->{$id} }}">
            <label for="{{ $unit_name }}_{{ $item->{$id} }}" class="custom-control-label">{{ $item->{$name} }}</label>
        </div>
    @endforeach
</div>
