<div class="row">
    <div class="col-md-{{ $size }}">
        <label for="{{ $name }}" class="control-label">{{ $label }}</label>
    </div>
    <div class="col-md-{{ 12 - $size }}">
        <select name="{{ $name }}" id="{{ $name }}" class="form-control" {{ $required ?? '' }}>
            <option>{{ $placeholder }}</option>
            @foreach ($data['list'] as $item)
            <option value="{{ $data['value']($item) }}" {{ ($value ?? '') === $data['value']($item) ? 'selected' : '' }}>{{ $data['label']($item) }}</option>
            @endforeach
        </select>
    </div>
</div>
