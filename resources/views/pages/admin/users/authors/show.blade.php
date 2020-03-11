@extends('layouts.admin')

@section('section', 'Authors')
@section('title', 'Author Details')

@section('content')
@component('components.auth.pages.admin.page')
<div class="row">
    <div class="col-lg-6">
        <div class="border">
            <div class="py-2 px-3 h2 border-bottom bg-white-10">User Information</div>
            <div class="py-3 px-3">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="user_id" class="control-label font-weight-bold">User ID</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $author->user->ref }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="sponsor_id" class="control-label font-weight-bold">Sponsor ID</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $author->user->sponsor()->ref }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="lang" class="control-label font-weight-bold">Language</label>
                    </div>
                    <div class="col-sm-8">
                        {{ App\Language::whereLang($author->user->lang)->first()->name }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="first_name" class="control-label font-weight-bold">First Name</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $author->user->first_name }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="last_name" class="control-label font-weight-bold">Last Name</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $author->user->last_name }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="email" class="control-label font-weight-bold">E-Mail Address</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $author->user->email }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="phone" class="control-label font-weight-bold">Phone Number</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $author->user->phone }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="status" class="control-label font-weight-bold">Status</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $author->user->is_active ? 'Active' : 'Inactive' }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="created_at" class="control-label font-weight-bold">Registration Date</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $author->user->created_at->format('d M Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="border">
            <div class="py-2 px-3 h2 border-bottom bg-white-10">Deposits</div>
            <div class="py-3 px-3">
                <div class="table-responsive">
                    <table class="table table-bordered table-dark">
                        <thead class="bg-green text-montserrat">
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Method</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($author->user->deposits as $index => $deposit)
                            <tr>
                                <th scope="row">{{ $index }}</th>
                                <td>{{ $deposit->amount }}</td>
                                <td>{{ $deposit->method->name }}</td>
                                <td>{{ $deposit->created_at->format('d M Y') }}</td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endcomponent
@endsection