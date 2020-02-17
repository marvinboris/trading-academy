@extends('layouts.admin')

@section('content')
    <section class="p-5">
        <div class="pb-2 mb-3 border-bottom d-flex justify-content-between align-items-center">
            <strong class="d-inline-flex align-items-center text-montserrat-alt text-x-large">
                <i class="fas fa-mail-bulk text-orange fa-lg mr-2"></i>
                <div>My Posts</div>
            </strong>
            <div>
                <ol class="breadcrumb bg-transparent m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-green text-900">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Posts</li>
                </ol>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-between text-montserrat mb-3">
            <div class="d-flex align-items-center text-secondary bg-black-10">
                <div class="px-3 py-2 font-weight-bold border-right border-black-20">Show</div>
                <div class="px-3 py-2 d-flex justify-content-between align-items-center">
                    <span>10</span>
                    <i class="fas fa-caret-down pl-3"></i>
                </div>
            </div>

            <div class="bg-black-10 d-flex text-dark align-items-center font-weight-bold py-2">
                <a href="#" class="px-2 text-decoration-none text-reset"><i class="fas fa-file-excel text-darkblue mr-2"></i>Excel</a>
                <a href="#" class="px-2 text-decoration-none text-reset"><i class="fas fa-file-pdf text-red mr-2"></i>PDF</a>
                <a href="#" class="px-2 text-decoration-none text-reset"><i class="fas fa-file-csv text-green mr-2"></i>CSV</a>
                <a href="#" class="px-2 text-decoration-none text-reset"><i class="fas fa-print text-primary mr-2"></i>Print</a>
            </div>

            <div>
                <input type="search" class="form-control bg-black-10 border-0" placeholder="Search...">
            </div>

            <div class="text-right text-montserrat text-900">
                <a href="{{ route('author.posts.index') }}" class="btn font-weight-bold btn-orange d-inline-flex p-0">
                    <div class="py-2 px-3 border-right border-white-50"><i class="fas fa-list"></i></div>
                    <div class="py-2 px-3">My Posts</div>
                </a>
                <a href="{{ route('author.posts.create') }}" class="btn font-weight-bold btn-green d-inline-flex p-0">
                    <div class="py-2 px-3 border-right border-white-50"><i class="fas fa-plus"></i></div>
                    <div class="py-2 px-3">Add a Post</div>
                </a>
            </div>
        </div>

        <div class="table-responsive mb-2">
            <table class="table table-bordered">
                <thead class="bg-green text-white text-montserrat">
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Title</th>
                        <th scope="col">Body</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $index => $post)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ strlimit($post->body) }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->id }}</td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between">
            <div>
                Showing <strong>1 to 10</strong> of <strong>{{ count($posts) }}</strong> entries.
            </div>
        </div>
    </section>
@endsection