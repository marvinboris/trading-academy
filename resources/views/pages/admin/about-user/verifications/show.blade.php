@extends('layouts.admin')

@section('section', 'About User')
@section('title', 'Verifications')

@section('content')
@component('components.auth.pages.admin.page')
<div class="row">
    <div class="col-lg-7">
        <div class="border">
            <div class="py-2 px-3 h2 border-bottom bg-white-10">Uploaded Information for Profile Verification</div>
            <div class="py-3 px-3">
                <form action="{{ route('admin.about-user.verifications.post', $verification->user->ref) }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="type" class="control-label font-weight-bold">Verification Type</label>
                        </div>
                        <div class="col-sm-8">
                            {{ $verification->type }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="first_name" class="control-label font-weight-bold">First Name</label>
                        </div>
                        <div class="col-sm-8">
                            {{ $verification->first_name }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="last_name" class="control-label font-weight-bold">Last Name</label>
                        </div>
                        <div class="col-sm-8">
                            {{ $verification->last_name }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="gender" class="control-label font-weight-bold">Gender</label>
                        </div>
                        <div class="col-sm-8">
                            {{ $verification->gender === 'm' ? 'Male' : 'Female' }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="nid" class="control-label font-weight-bold">NID</label>
                        </div>
                        <div class="col-sm-8">
                            {{ $verification->nid }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="expiry_date" class="control-label font-weight-bold">Expiry date</label>
                        </div>
                        <div class="col-sm-8">
                            {{ $verification->expiry_date }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="doc_1" class="control-label font-weight-bold">Doc I</label>
                        </div>
                        <div class="col-sm-8 position-relative">
                            <img src="{{ $verification->doc_1 }}" alt="Doc I" class="img-fluid">
                            <button class="btn btn-green position-absolute" style="top: 0; right: 15px;" type="button" data-toggle="modal" data-target="#doc-1"><i class="fas fa-search-plus fa-lg"></i></button>
                            <div class="modal fade" id="doc-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark" id="exampleModalLabel">Doc I</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ $verification->doc_1 }}" alt="Doc I" class="img-fluid">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="doc_2" class="control-label font-weight-bold">Doc II</label>
                        </div>
                        <div class="col-sm-8 position-relative">
                            <img src="{{ $verification->doc_2 }}" alt="Doc II" class="img-fluid">
                            <button class="btn btn-green position-absolute" style="top: 0; right: 15px;" type="button" data-toggle="modal" data-target="#doc-2"><i class="fas fa-search-plus fa-lg"></i></button>
                            <div class="modal fade" id="doc-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark" id="exampleModalLabel">Doc II</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ $verification->doc_2 }}" alt="Doc II" class="img-fluid">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="doc_3" class="control-label font-weight-bold">Doc III</label>
                        </div>
                        <div class="col-sm-8 position-relative">
                            <img src="{{ $verification->doc_3 }}" alt="Doc III" class="img-fluid">
                            <button class="btn btn-green position-absolute" style="top: 0; right: 15px;" type="button" data-toggle="modal" data-target="#doc-3"><i class="fas fa-search-plus fa-lg"></i></button>
                            <div class="modal fade" id="doc-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark" id="exampleModalLabel">Doc III</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ $verification->doc_3 }}" alt="Doc III" class="img-fluid">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="created_at" class="control-label font-weight-bold">Upload Document</label>
                        </div>
                        <div class="col-sm-8">
                            {{ $verification->created_at }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="status" class="control-label font-weight-bold">Status</label>
                        </div>
                        <div class="col-sm-8">
                            {{ ['Pending', 'Cancelled', 'Verified'][$verification->status] }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="admin_id" class="control-label font-weight-bold">Approved / Cancelled by</label>
                        </div>
                        <div class="col-sm-8">
                            {{ $verification->admin_id ? $verification->admin->email : 'NA' }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="comment" class="control-label font-weight-bold">Approved / Cancelled note</label>
                        </div>
                        <div class="col-sm-8">
                            <textarea name="comment" id="comment" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            @if ($verification->status !== 1)
                            <button class="btn btn-orange" name="approved" value="0">Cancel</button>
                            @endif
                            @if ($verification->status !== 2)
                            <button class="btn btn-green" name="approved" value="1">Approve</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="border">
            <div class="py-2 px-3 h2 border-bottom bg-white-10">User Information</div>
            <div class="py-3 px-3">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="user_id" class="control-label font-weight-bold">User ID</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $verification->user->ref }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="sponsor_id" class="control-label font-weight-bold">Sponsor ID</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $verification->user->sponsor()->ref }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="lang" class="control-label font-weight-bold">Language</label>
                    </div>
                    <div class="col-sm-8">
                        {{ App\Language::whereLang($verification->user->lang)->first()->name }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="first_name" class="control-label font-weight-bold">First Name</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $verification->user->first_name }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="last_name" class="control-label font-weight-bold">Last Name</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $verification->user->last_name }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="email" class="control-label font-weight-bold">E-Mail Address</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $verification->user->email }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="phone" class="control-label font-weight-bold">Phone Number</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $verification->user->phone }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="status" class="control-label font-weight-bold">Status</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $verification->user->is_active ? 'Active' : 'Inactive' }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="created_at" class="control-label font-weight-bold">Registration Date</label>
                    </div>
                    <div class="col-sm-8">
                        {{ $verification->user->created_at->format('d M Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endcomponent
@endsection