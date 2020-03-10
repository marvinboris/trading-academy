<div class="row">
    <div class="col-md-{{ $size ?? 12 }}">
        <label for="{{ $name }}" class="control-label">{{ $label }}</label>
    </div>
    <div class="col-md-{{ $size ? 12 - $size : 12 }}">
        <div class="row">
            @foreach ($list as $key => $item)
                <div class="col-6 col-md-4 col-lg-3 custom-control custom-checkbox">
                    <input type="checkbox" name="{{ $name }}[]" class="custom-control-input" id="{{ $name }}_{{ $item->{$id} }}" {{ ($checkedList ?? false) ? ($item->{$id} === $checkedList[$key]->{$id} ? 'checked' : '') : '' }} value="{{ $item->{$id} }}">
                    <label for="{{ $name }}_{{ $item->{$id} }}" class="custom-control-label">{{ $item->{$unit_name} }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
