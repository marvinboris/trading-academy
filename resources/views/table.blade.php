<div class="table-responsive mb-2">
    <table class="table table-hover table-bordered">
        <thead class="bg-green text-white text-montserrat">
            <tr>
                <th scope="row" class="py-2">SL</th>
                @foreach ($table as $value)
                <th scope="row" class="py-2">{{ $value['key'] }}</th>
                @endforeach
                <th scope="row" class="py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $index => $item)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                @foreach ($table as $key => $value)
                <td>{{ $value['value']($item) }}</td>
                @endforeach
                <td>
                    <form action="{{ route($links['base'] . 'destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route($links['base'] . 'show', $item->id) }}" class="fas text-decoration-none mr-2 fa-eye text-success"></a>
                        <button class="border-0 p-0 fas text-decoration-none mr-2 fa-trash text-danger"></button>
                        <a href="{{ route($links['base'] . 'edit', $item->id) }}" class="fas text-decoration-none fa-edit text-primary"></a>
                    </form>
                </td>
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