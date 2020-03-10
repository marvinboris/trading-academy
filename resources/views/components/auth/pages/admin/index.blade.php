<div class="row align-items-center justify-content-between text-montserrat mb-3">
    <div class="col-6 pb-2 pb-lg-0 col-lg-2">
        <div class="d-flex align-items-center bg-white-20 text-white">
            <div class="px-3 py-2 font-weight-bold border-right border-white-50">Show</div>
            <select class="px-3 py-2 text-center d-block text-reset form-control border-0 bg-white-20 text-white">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="All">All</option>
            </select>
        </div>
    </div>

    <div class="col-6 d-lg-none pb-2 pb-lg-0">
        <input type="search" class="form-control bg-white-20 text-white border-0" placeholder="Search...">
    </div>

    <div class="col-lg-4 pb-2 pb-lg-0">
        <div class="bg-white-20 text-white d-flex text-white justify-content-around align-items-center font-weight-bold py-2">
            <a href="{{ route('export.xlsx') }}" class="px-2 export text-decoration-none text-reset"><i class="fas fa-file-excel text-green mr-2"></i>Excel</a>
            <a href="{{ route('export.pdf') }}" class="px-2 export text-decoration-none text-reset"><i class="fas fa-file-pdf text-purered mr-2"></i>PDF</a>
            <a href="{{ route('export.csv') }}" class="px-2 export text-decoration-none text-reset"><i class="fas fa-file-csv text-yellow mr-2"></i>CSV</a>
            <a href="{{ route('export.pdf') }}" class="px-2 export text-decoration-none text-reset"><i class="fas fa-print text-primary mr-2"></i>Print</a>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="row align-items-center">
            <div class="col-3 d-none d-lg-block">
                <input type="search" class="form-control bg-white-20 text-white border-0" placeholder="Search...">
            </div>

            <div class="col-12 col-lg-6 col-xl-9">
                <div class="text-right text-montserrat text-900 row">
                    <div class="col-6 pr-1">
                        <a href="{{ route($links['base'] . 'index') }}" class="btn font-weight-bold btn-yellow d-flex p-0">
                            <div class="py-2 px-3 border-right border-white-50"><i class="fas fa-list"></i></div>
                            <div class="py-2 px-3">{{ $links['index'] }}</div>
                        </a>
                    </div>
                    <div class="col-6 pl-1">
                        <a href="{{ route($links['base'] . 'create') }}" class="btn font-weight-bold btn-green d-flex p-0">
                            <div class="py-2 px-3 border-right border-white-50"><i class="fas fa-plus"></i></div>
                            <div class="py-2 px-3">{{ $links['create'] }}</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="tag_container">
    @csrf
    <input type="hidden" name="data" value="{{ json_encode($list) }}">
    <div class="table-responsive mb-2">
        <table class="table table-dark table-hover table-bordered border-thin">
            <thead class="bg-green-80 text-white text-montserrat">
                <tr>
                    <th scope="row" class="py-2">SL</th>
                    @foreach ($table as $value)
                    <th scope="row" class="py-2">{{ $value['key'] }}</th>
                    @endforeach
                    <th scope="row" class="py-2">Action</th>
                </tr>
            </thead>
            <tbody class="text-white bg-white-0">
                @foreach ($list as $index => $item)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    @foreach ($table as $key => $value)
                    <td>@if ($raw ?? false) {{ $value['value']($item) }} @else {!! $value['value']($item) !!} @endif</td>
                    @endforeach
                    <td>
                        <a href="{{ route($links['base'] . 'show', $item->id) }}" class="fas text-decoration-none mr-2 fa-eye text-success"></a>
                        <a href="#" class="fas text-decoration-none mr-2 fa-trash text-danger"></a>
                        <a href="{{ route($links['base'] . 'edit', $item->id) }}" class="fas text-decoration-none fa-edit text-primary"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center">
    <div>
        Showing <strong>{{ count($list) ? 1 : 0 }} to {{ count($list) }}</strong> of <strong>{{ count($all) }}</strong> entries.
    </div>

    <div>
        {!! $list->render() !!}
    </div>
</div>

@section('scripts')
@include('scripts.pagination')
@endsection
