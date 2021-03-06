@extends('layouts.user')

@section('section', 'Documents')
@section('title', 'Add a Document')

@section('content')
@component('components.auth.page')
@component('components.auth.pages.create', ['data' => $data])
<div class="col-lg-3">
    <div class="text-center text-montserrat px-3">
        <div><button class="btn btn-block btn-green font-weight-bold mb-3">Save</button></div>
        <div><a href="route" class="btn btn-block btn-orange font-weight-bold">Cancel</a></div>
    </div>
</div>
@endcomponent
@endcomponent
@endsection
