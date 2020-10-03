@extends('layouts.user')

@section('section', 'Blog')
@section('parent') <a href="{{ route('author.posts.index') }}" class="text-green text-900">My Posts</a> @endsection
@section('title', 'Edit Post')

@section('content')
@component('components.auth.page')
@component('components.auth.pages.create', ['data' => $data])
@method('PATCH')
<div class="col-lg-3">
    <div class="p-4 bg-white border mb-3">
        <div class="border rounded-circle embed-responsive embed-responsive-1by1 mb-3" style="background: url('{{ asset($data['data']->photo->path) }}') no-repeat center; background-size: cover;"></div>
        <div class="text-center">
            <a href="#" id="upload" data-target="{{ $data['content'][2]['data']['name'] }}" class="text-green">Click to upload image</a>
        </div>
    </div>
    <div class="text-center text-montserrat px-3">
        <div><button class="btn btn-block btn-green font-weight-bold mb-3">Save</button></div>
        <div><a href="{{ route('author.posts.index') }}" class="btn btn-block btn-orange font-weight-bold">Cancel</a></div>
    </div>
</div>
@endcomponent
@endcomponent
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#upload').click(function (e) {
                e.preventDefault();
                
                const targetName = $(this).attr('data-target');
                const target = $('label[for="' + targetName + '"]').parent().find('input');
                target.click();
            });
        });
    </script>
@endsection