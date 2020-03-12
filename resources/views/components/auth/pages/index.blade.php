<div class="row align-items-center justify-content-between text-montserrat mb-3">
    <div class="col-6 pb-2 pb-lg-0 col-lg-2">
        <div class="d-flex align-items-center text-secondary bg-black-10">
            <div class="px-3 py-2 font-weight-bold border-right border-black-20">Show</div>
            <select name="show" class="px-3 py-2 text-center d-block text-reset form-control border-0 bg-black-10">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="All">All</option>
            </select>
        </div>
    </div>

    <div class="col-6 d-lg-none pb-2 pb-lg-0">
        <input type="search" class="form-control bg-black-10 border-0" placeholder="Search...">
    </div>

    <div class="col-lg-4 pb-2 pb-lg-0">
        <div class="bg-black-10 d-flex text-black justify-content-around align-items-center font-weight-bold py-2">
            <a href="{{ route('export.xlsx') }}" class="px-2 export text-decoration-none text-reset"><i class="fas fa-file-excel text-darkblue mr-2"></i>Excel</a>
            <a href="{{ route('export.pdf') }}" class="px-2 export text-decoration-none text-reset"><i class="fas fa-file-pdf text-danger mr-2"></i>PDF</a>
            <a href="{{ route('export.csv') }}" class="px-2 export text-decoration-none text-reset"><i class="fas fa-file-csv text-green mr-2"></i>CSV</a>
            <a href="{{ route('export.pdf') }}" class="px-2 export text-decoration-none text-reset"><i class="fas fa-print text-primary mr-2"></i>Print</a>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="row align-items-center">
            <div class="col-3 d-none d-lg-block">
                <input type="search" class="form-control bg-black-10 border-0" placeholder="Search...">
            </div>

            <div class="col-12 col-lg-6 col-xl-9">
                <div class="text-right text-montserrat text-900 row">
                    <div class="col-6 pr-1">
                        <a href="{{ route($links['base'] . 'index') }}" class="btn font-weight-bold btn-orange d-flex p-0">
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
    @include('table')  
</div>


@section('scripts')
@include('scripts.pagination')
@endsection
