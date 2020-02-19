@extends('layouts.admin')

@section('section', 'Blog')
@section('title', 'Add Post')

@section('content')
@component('components.auth.page')
@component('components.auth.pages.create', ['data' => $data])
<div class="col-lg-4">
    <div class="bg-white py-3 px-4">
        <div class="border rounded-circle embed-responsive embed-responsive-1by1 mb-3"></div>
    </div>
    <div class="text-center"><button class="btn btn-green mb-3">Save</button></div>
    <div class="text-center"><a href="route" class="btn btn-orange">Cancel</a></div>
</div>
@endcomponent
@endcomponent
@endsection
