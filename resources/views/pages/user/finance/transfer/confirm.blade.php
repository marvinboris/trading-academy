@extends('layouts.user')

@section('section', 'Transfer')
@section('title', 'Transfer')

@section('content')
@component('components.auth.page')
<form action="{{ route('user.finance.transfers.confirm') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-9">
            <div class="row py-2 border-top">
                <div class="col-4"><strong>Send To</strong></div>
                <div class="col-8">{{ $receiver->name() }}</div>
            </div>
            <div class="row py-2 border-top">
                <div class="col-4"><strong>E-Mail Address</strong></div>
                <div class="col-8">{{ $receiver->email }}</div>
            </div>
            <div class="row py-2 border-top">
                <div class="col-4"><strong>Phone</strong></div>
                <div class="col-8">{{ $receiver->phone }}</div>
            </div>
            <div class="row py-2 border-top">
                <div class="col-4"><strong>User ID</strong></div>
                <div class="col-8">{{ $receiver->ref }}</div>
            </div>
            <div class="row py-2 border-top">
                <div class="col-4"><strong>Transfer Amount</strong></div>
                <div class="col-8">{{ $amount }}</div>
            </div>
            <div class="row py-2 border-top">
                <div class="col-8 offset-4">
                    <input type="text" name="code" class="form-control" required>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <div>
                    <button class="btn btn-green">Confirm</button>
                    <button type="reset" class="btn btn-orange">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endcomponent
@endsection