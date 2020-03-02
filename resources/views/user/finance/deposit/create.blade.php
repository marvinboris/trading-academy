@extends('layouts.user')

@section('section', 'Deposit')
@section('title', 'Add a Deposit')

@section('content')
@component('components.auth.page')
<form action="{{ route('user.finance.deposits.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="form-group row">
                <label for="amount" class="control-label col-4">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control col-8" required>
            </div>
            <div class="form-group row">
                <label for="id" class="control-label col-4">Method</label>
                <select name="id" id="id" class="form-control col-8" required>
                    <option>Select a method</option>
                    @foreach ($methods as $method)
                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label for="comment" class="control-label col-4">Comment</label>
                <textarea name="comment" id="comment" class="form-control col-8"></textarea>
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

@section('scripts')
<script type="text/javascript" src="https://fr.monetbil.com/widget/v2/monetbil.min.js"></script>
@endsection