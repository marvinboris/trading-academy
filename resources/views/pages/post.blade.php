@extends('layouts.app')

@section('content')
@component('components.banner', ['title' => $content['title']])
@endcomponent

@component('components.section', [
    'bgColor' => 'light',
    'fontColor' => 'dark',
    'title' => [
        'color' => 'green',
        'text' => ''
    ],
    'subtitle' => ''
])
    <div class="row">
        <div class="col-lg-9">
            <h1 class="d-none d-md-block">{{ $post->title }}</h1>
            <h3 class="d-md-none">{{ $post->title }}</h3>
            <div class="lead">{{ $content['by'] }} <span class="text-green">{{ $post->author->user->name() }}</span></div>
            <hr>
            <strong>{{ $content['posted_on'] }} {{ $post->created_at->format('M d, Y') }}</strong>
            <hr>
            <div class="rounded-lg embed-responsive embed-responsive-21by9" style="background: url({{ asset($post->photo->path) }}) no-repeat center; background-size: cover;"></div>
            <hr>
            <div>
                {!! $post->body !!}
            </div>
            <hr>
            <div class="mt-4">
                @auth
                <div class="card mb-4">
                    <div class="card-header">
                        {{ $content['leave_comment'] }} :
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.store', $post->slug) }}" method="post" class="ajax">
                            @csrf
                            <div class="form-group">
                                <textarea name="body" id="body" class="form-control"></textarea>
                            </div>
                            <button class="btn btn-green">{{ $content['submit'] }} <i class="fas fa-arrow-circle-right ml-1"></i></button>
                        </form>
                    </div>
                </div>
                @endauth
            </div>

            <div id="comments">
                @include('post')
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card mb-4">
                <h5 class="card-header">{{ $content['search'] }}</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="{{ $content['search_for'] }}">
                        <span class="input-group-btn">
                            <button class="btn btn-green" type="button">{{ $content['go'] }}</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <h5 class="card-header">{{ $content['latest_posts'] }}</h5>
                <div class="card-body">
                    @foreach ($latest_posts as $post)
                    <a href="{{ route('blog', $post->slug) }}" class="text-reset py-3 border-bottom d-block">
                        <h6 class="m-0">{{ $post->title }}</h6>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endcomponent
@endsection

@section('scripts')
<script>
    $(function () {
        const postData = (url, data) => {
            $.ajax({
                url,
                data,
                method: 'POST',
                success: data => $('#comments').html(data),
                error: err => console.log(err)
            })
            .fail(() => alert('Data could not be sent.'));
        }

        $('form.ajax').submit(function (e) {
            e.preventDefault();
            const url = $(this).attr('action');
            const data = {};

            data._token = $(this).find('input[name="_token"]').val();
            data.comment_id = $(this).find('input[name="comment_id"]') ? $(this).find('input[name="comment_id"]').val() : null;
            data.body = $(this).find('textarea').val();

            if (!data.comment_id) $(this).find('textarea').val('');

            postData(url, data);
        });
    });
</script>
@endsection
