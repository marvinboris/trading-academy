<div class="row align-items-center justify-content-between text-montserrat mb-3">
    <div class="col-2">
        <div class="d-flex align-items-center text-secondary bg-black-10">
            <div class="px-3 py-2 font-weight-bold border-right border-black-20">Show</div>
            <select class="px-3 py-2 text-center d-block text-reset form-control border-0 bg-black-10">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="All">All</option>
            </select>
        </div>
    </div>
    

    <div class="row col-10 align-items-center">
        <div class="col-5">
            <div class="bg-black-10 d-flex text-black justify-content-around align-items-center font-weight-bold py-2">
                <a href="#" class="px-2 text-decoration-none text-reset"><i class="fas fa-file-excel text-darkblue mr-2"></i>Excel</a>
                <a href="#" class="px-2 text-decoration-none text-reset"><i class="fas fa-file-pdf text-danger mr-2"></i>PDF</a>
                <a href="#" class="px-2 text-decoration-none text-reset"><i class="fas fa-file-csv text-green mr-2"></i>CSV</a>
                <a href="#" class="px-2 text-decoration-none text-reset"><i class="fas fa-print text-primary mr-2"></i>Print</a>
            </div>
        </div>
        

        <div class="col-2">
            <input type="search" class="form-control bg-black-10 border-0" placeholder="Search...">
        </div>

        <div class="col-5">
            <div class="text-right text-montserrat text-900">
                <a href="{{ $index['link'] }}" class="btn font-weight-bold btn-orange d-inline-flex p-0">
                    <div class="py-2 px-3 border-right border-white-50"><i class="fas fa-list"></i></div>
                    <div class="py-2 px-3">{{ $index['name'] }}</div>
                </a>
                <a href="{{ $create['link'] }}" class="btn font-weight-bold btn-green d-inline-flex p-0">
                    <div class="py-2 px-3 border-right border-white-50"><i class="fas fa-plus"></i></div>
                    <div class="py-2 px-3">{{ $create['name'] }}</div>
                </a>
            </div>
        </div>
        
    </div>
    
</div>

<div class="table-responsive mb-2">
    <table class="table table-bordered">
        <thead class="bg-green text-white text-montserrat">
            <tr>
                <th class="py-2">SL</th>
                @foreach ($table as $value)
                <th class="py-2">{{ $value['key'] }}</th>
                @endforeach
                <th class="py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                @foreach ($table as $key => $value)
                <td>{{ $value['value']($item) }}</td>
                @endforeach
                <td>
                    <a href="#" class="fas text-decoration-none mr-2 fa-eye text-success"></a>
                    <a href="#" class="fas text-decoration-none mr-2 fa-trash text-danger"></a>
                    <a href="#" class="fas text-decoration-none fa-edit text-primary"></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-between align-items-center">
    <div>
        Showing <strong>1 to 10</strong> of <strong>{{ count($list) }}</strong> entries.
    </div>

    <div>

    </div>
</div>