@extends('layouts.user')

@section('section', 'Settings')
@section('title', 'Verify my account')

@section('content')
@component('components.auth.page')
<form action="{{ route('user.settings.verification.post') }}" class="d-flex justify-content-center align-items-center" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card w-100">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="first-name" class="control-label">First Name</label>
                    <input type="text" required class="form-control" name="first_name" id="first-name">
                </div>
                <div class="form-group col-lg-6">
                    <label for="last-name" class="control-label">Last Name</label>
                    <input type="text" required class="form-control" name="last_name" id="last-name">
                </div>
                <div class="form-group col-lg-6">
                    <label for="gender" class="control-label">Gender</label>
                    <select name="gender" class="form-control" id="gender">
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="type" class="control-label">Document Type</label>
                    <select name="type" class="form-control" id="type">
                        @foreach ($types as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="nid" class="control-label">NID</label>
                    <input type="text" required class="form-control" name="nid" id="nid">
                </div>
                <div class="form-group col-lg-6">
                    <label for="expiry-date" class="control-label">Expiry Date</label>
                    <input type="date" required class="form-control" name="expiry_date" id="expiry-date">
                </div>
            </div>
            <div class="form-group">
                <label for="doc-1" class="control-label">Doc I</label>
                <div class="custom-file">
                    <input type="file" name="doc_1" id="doc-1" class="custom-file-input" required>
                    <label for="doc-1" class="custom-file-label">Send a selfie of yourself showing your document</label>
                </div>
            </div>
            <div class="form-group">
                <label for="doc-2" class="control-label">Doc II</label>
                <div class="custom-file">
                    <input type="file" name="doc_2" id="doc-2" class="custom-file-input" required>
                    <label for="doc-2" class="custom-file-label">Send a photo of the front of your document</label>
                </div>
            </div>
            <div class="form-group">
                <label for="doc-3" class="control-label">Doc III</label>
                <div class="custom-file">
                    <input type="file" name="doc_3" id="doc-3" class="custom-file-input" required>
                    <label for="doc-3" class="custom-file-label">Send a photo of the back of your document</label>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-green">Change</button>
            </div>
        </div>
    </div>
</form>
@endcomponent
@endsection