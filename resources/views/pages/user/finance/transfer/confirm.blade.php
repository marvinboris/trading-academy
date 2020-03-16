@extends('layouts.user')

@section('section', 'Transfer')
@section('title', 'Transfer')

@section('content')
@component('components.auth.page')
<form action="{{ route('user.finance.transfers.confirm') }}" method="post" home="{{ route('user.finance.transfers.index') }}">
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

@section('scripts')
    <script>
        $(function () {
            $('form').submit(function (e) {
                const current = $(this);
                const url = current.attr('action');
                const method = current.attr('method');
                const home = current.attr('home');
                const data = {};

                data._token = current.find('input[name="_token"]').val();
                data.code = current.find('input[name="code"]').val();

                e.preventDefault();

                $.ajax({
                    url,
                    method,
                    data,
                    success: function (data) {
                        if (data === 'true') {
                            Swal.fire({
                                title: 'Good job!',
                                text: 'Transaction completed !',
                                icon: 'success',
                                onClose: function () {
                                    window.location = home;
                                }
                            });
                        } else {
                            window.location = url;
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
                .fail(function () {
                    alert('Cannot proceed');
                })
            })
        });
    </script>
@endsection