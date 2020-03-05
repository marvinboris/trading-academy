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
                <div class="col-md-4">
                    <label for="amount" class="control-label">Amount</label>
                </div>
                <div class="col-md-8">
                    <input type="number" name="amount" id="amount" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="id" class="control-label">Method</label>
                </div>
                <div class="col-md-8">
                    <select name="id" id="id" class="form-control" required>
                        <option>Select a method</option>
                        @foreach ($methods as $method)
                        <option value="{{ $method->id }}">{{ $method->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="comment" class="control-label">Comment</label>
                </div>
                <div class="col-md-8">                    
                    <textarea name="comment" id="comment" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-md-4 col-md-8">
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