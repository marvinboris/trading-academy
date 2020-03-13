<div class="table-responsive mb-2">
    <table class="table table-hover table-bordered">
        <thead class="bg-green text-white text-montserrat">
            <tr>
                <th scope="row" class="py-2">SL</th>
                @foreach ($table as $value)
                <th scope="row" class="py-2">{{ $value['key'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $index => $item)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                @foreach ($table as $key => $value)
                <td>{!! $value['value']($item) !!}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-between align-items-center">
    <div>
        Showing <strong>{{ count($list) ? 1 : 0 }} to {{ count($list) }}</strong> of <strong>{{ count($all) }}</strong> entries.
    </div>

    <div>
        {!! $list->render() !!}
    </div>
</div>