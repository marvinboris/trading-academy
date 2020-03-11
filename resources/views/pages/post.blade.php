@extends('layouts.app')

@section('content')
@component('components.banner', ['title' => 'Blog'])
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
        <div class="col-lg-8">
            <h1>{{ $post->title }}</h1>
            <div class="lead">by <span class="text-green">{{ $post->author->user->name() }}</span></div>
            <hr>
            <strong>Posted on {{ $post->created_at->format('M d, Y') }}</strong>
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
                        Leave a comment :
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.store', $post->slug) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <textarea name="body" id="body" class="form-control"></textarea>
                            </div>
                            <button class="btn btn-green">Submit <i class="fas fa-arrow-circle-right ml-1"></i></button>
                        </form>
                    </div>
                </div>
                @endauth
            </div>

            <div id="comments">
                @foreach ($post->comments as $comment)
                <div class="media mb-4">
                    {!! Auth::user()->photo ?
                    '<img src="' . asset(Auth::user()->photo) .'" alt="User" class="rounded-circle mr-3 img-fluid" style="width: 50px; height: 50px;">'
                    :
                    '<div class="d-flex justify-content-center align-items-center font-weight-bold text-white text-montserrat rounded-circle mr-3 bg-black-50 text-x-small" style="width: 50px; height: 50px; outline-offset: 4px; box-shadow: 0 0 0 2px white;">' . Auth::user()->abbreviation() . '</div>'
                    !!}
                    <div class="media-body">
                        <h5 class="mt-0">{{ $comment->user->name() }}</h5>
                        {!! $comment->body !!}
                        <div class="mt-3">
                            <form action="{{ route('posts.store', $post->slug) }}" method="post">
                                @csrf
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                <div class="input-group">
                                    <textarea name="body" class="form-control" style="height: 2.5rem;"></textarea>
                                    <div class="input-group-append">
                                        <div class="input-group-btn">
                                            <button class="btn btn-green btn-block h-100"><i class="fas fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @foreach ($comment->replies as $reply)
                        <div class="media mt-4">
                            {!! Auth::user()->photo ?
                            '<img src="' . asset(Auth::user()->photo) .'" alt="User" class="rounded-circle mr-3 img-fluid" style="width: 50px; height: 50px;">'
                            :
                            '<div class="d-flex justify-content-center align-items-center font-weight-bold text-white text-montserrat rounded-circle mr-3 bg-black-50 text-x-small" style="width: 50px; height: 50px; outline-offset: 4px; box-shadow: 0 0 0 2px white;">' . Auth::user()->abbreviation() . '</div>'
                            !!}
                            <div class="media-body">
                            <h5 class="mt-0">{{ $reply->user->name() }}</h5>
                            {!! $reply->body !!}
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                @endforeach
            </div>
            
            
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcomponent
@endsection
