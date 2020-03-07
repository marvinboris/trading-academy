@extends('layouts.admin')

@section('section', 'CMS')
@section('title', 'Global')

@section('content')
@component('components.auth.pages.admin.page')
<div class="row align-items-center">
    <form action="{{ route('admin.cms.global.post') }}" method="post" class="col-md-9" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-md-3">
                <label for="phone" class="control-label">Phone Number</label>
            </div>
            <div class="col-md-9">
                <input type="tel" id="phone" name="phone" required class="form-control" value="{{ $page_content['phone'] }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="email" class="control-label">Company E-Mail Address</label>
            </div>
            <div class="col-md-9">
                <input type="email" id="email" name="email" required class="form-control" value="{{ $page_content['email'] }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="contact" class="control-label">Contact E-Mail Address</label>
            </div>
            <div class="col-md-9">
                <input type="email" id="contact" name="contact" required class="form-control" value="{{ $page_content['contact'] }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="support" class="control-label">Support E-Mail Address</label>
            </div>
            <div class="col-md-9">
                <input type="email" id="support" name="support" required class="form-control" value="{{ $page_content['support'] }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="logo" class="control-label">Company Logo</label>
            </div>
            <div class="col-md-9">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="logo" name="logo">
                    <label class="custom-file-label" for="logo">Choose file</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="banner" class="control-label">Page Banner</label>
            </div>
            <div class="col-md-9">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="banner" name="banner">
                    <label class="custom-file-label" for="banner">Choose file</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-9 offset-md-3">
                <button class="btn btn-green">Submit <i class="fas fa-arrow-circle-right ml-2"></i></button>
            </div>
        </div>
    </form>
    <div class="col-md-3">
        <img src="{{ $page_content['logo'] }}" alt="Logo" class="img-fluid img-thumbnail bg-white-10 mb-3">
        <img src="{{ $page_content['banner'] }}" alt="Logo" class="img-fluid img-thumbnail bg-white-10">
    </div>
</div>
@endcomponent
@endsection