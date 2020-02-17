@extends('layouts.admin')

@section('content')
<section class="border bg-white mt-3 p-3">
    <div class="pb-2 mb-3 border-bottom d-flex justify-content-between align-items-center">
        <strong class="d-inline-flex align-items-center text-montserrat-alt text-x-large">
            <i class="fas fa-mail-bulk text-orange fa-lg mr-2"></i>
            <div>Add a Post</div>
        </strong>
        <div>
            <ol class="breadcrumb bg-transparent m-0 p-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-green text-900">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add a Post</li>
            </ol>
        </div>
    </div>

    <div class="text-right mx-0 mb-3">
        <a href="{{ route('author.posts.index') }}" class="btn btn-orange">My Posts</a>
        <a href="{{ route('author.posts.create') }}" class="btn btn-green">Add a Post</a>
    </div>

    

</section>
@endsection