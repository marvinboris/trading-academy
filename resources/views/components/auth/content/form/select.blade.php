<div class="row">
    <label for="{{ $name }}" class="control-label col-{{ $size }}">{{ $label }}</label>
    <div class="col-{{ 12 - $size }} p-0">
        <select name="{{ $name }}" id="{{ $name }}" class="form-control" {{ $required ?? '' }}>
            <option>{{ $placeholder }}</option>
            @foreach ($data['list'] as $item)
            <option value="{{ $data['value']($item) }}">{{ $data['label']($item) }}</option>
            @endforeach
        </select>
    </div>
</div>
