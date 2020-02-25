<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="bg-{{ $headBgColor }} text-white text-montserrat">
            <tr>
                <th class="py-2">SL</th>
                @foreach ($table as $value)
                <th class="py-2">{{ $value['key'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="bg-{{ $bodyBgColor }}">
            @foreach ($list as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                @foreach ($table as $key => $value)
                <td>@if ($raw ?? false) {{ $value['value']($item) }} @else {!! $value['value']($item) !!} @endif</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>