@extends('layouts.user')

@section('section', 'Transfer')
@section('title', 'Transfer')

@section('content')
@component('components.auth.page')
<form action="{{ route('user.finance.transfers.store') }}" method="post">
    <div class="row">
        <div class="col-md-7">
            <div class="form-group row">
                <label for="receiver" class="control-label col-4">Receiver ID</label>
                <input type="text" name="receiver" id="receiver" class="form-control col-8" required>
            </div>
            <div class="form-group row">
                <label for="amount" class="control-label col-4">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control col-8" required>
            </div>
            <div class="form-group row">
                <label for="comment" class="control-label col-4">Comment</label>
                <textarea name="comment" id="comment" class="form-control col-8"></textarea>
            </div>
            <div class="form-group row">
                <label for="media" class="control-label col-4">OTP receiving media</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sms" name="media" value="sms" class="custom-control-input">
                        <label class="custom-control-label" for="sms">SMS</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="email" name="media" value="email" class="custom-control-input">
                        <label class="custom-control-label" for="email">E-Mail Address</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button class="btn btn-green">Transfer <i class="fas fa-arrow-circle-right ml-2"></i></button>
                    <button type="reset" class="btn btn-orange">Cancel <i class="fas fa-arrow-circle-left ml-2"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <h4 class="text-white bg-danger d-flex justify-content-between align-items-center py-2 px-3">
                <span>Read carefully</span>
                <span><i class="fas fa-exclamation-triangle"></i></span>
            </h4>
            <div class="card mb-3">
                <div class="card-body">
                    In other to make your experience here in Trading Academy system more accurate, dear users and customers, we kindly invite you to check your information regarding the transaction you are about to submit before proceeding. Make sure all information are correct then click on <span class="text-green font-weight-bold">"Transfer"</span> Button. Note that you can cancel this operation at any time by clicking on the <span class="text-orange font-weight-bold">"Cancel"</span> button.
                    Global Investment Tranding will not be responsible for any lost of money due to wrong ID transfer.
                </div>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="policy">
                <label class="custom-control-label" for="policy">I read and accept Transfer Policy</label>
            </div>
        </div>
    </div>
</form>
@endcomponent
@endsection