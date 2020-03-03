@extends('layouts.admin')

@section('section', 'Authors')
@section('title', 'Add an Author')

@section('content')
@component('components.auth.pages.admin.page')
<form action="{{ route('admin.deposits.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="form-group row">
                <label for="ref" class="control-label col-4">User ID</label>
                <input type="text" name="ref" id="ref" class="form-control col-8" required>
            </div>
            <div class="form-group row">
                <label for="amount" class="control-label col-4">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control col-8" required>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button class="btn btn-green">Deposit <i class="fas fa-arrow-circle-right ml-2"></i></button>
                    <button type="reset" class="btn btn-orange">Cancel <i class="fas fa-arrow-circle-left ml-2"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
@endcomponent
@endsection