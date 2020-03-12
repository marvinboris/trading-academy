@foreach ($post->comments()->latest()->get() as $comment)
<div class="media mb-3">
    {!! $comment->user->photo ?
    '<div style="background: url(' . asset($comment->user->photo->path) . ') no-repeat center; background-size: cover; width: 50px;" class="rounded-circle embed-responsive embed-responsive-1by1 mr-3"></div>'
    :
    '<div class="d-flex justify-content-center align-items-center font-weight-bold text-white text-montserrat rounded-circle mr-3 bg-black-50 text-x-small" style="width: 50px; height: 50px; outline-offset: 4px; box-shadow: 0 0 0 2px white;">' . $comment->user->abbreviation() . '</div>'
    !!}
    <div class="media-body">
        <span class="float-right">{{ $comment->created_at->diffForHumans() }}</span>
        <h5 class="mt-0">{{ $comment->user->name() }}</h5>
        {!! $comment->body !!}
        @auth
        <div class="float-right">
            <a href="#comment-{{ $comment->id }}" data-toggle="collapse" class="text-green">Reply</a>
        </div>
        <div id="comment-{{ $comment->id }}" class="collapse">
            <form action="{{ route('posts.store', $post->slug) }}" method="post" class="ajax">
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
        @endauth

        @foreach ($comment->replies()->latest()->get() as $reply)
        <div class="media mt-3">
            {!! $reply->user->photo ?
            '<div style="background: url(' . asset($reply->user->photo->path) . ') no-repeat center; background-size: cover; width: 50px;" class="rounded-circle embed-responsive embed-responsive-1by1 mr-3"></div>'
            :
            '<div class="d-flex justify-content-center align-items-center font-weight-bold text-white text-montserrat rounded-circle mr-3 bg-black-50 text-x-small" style="width: 50px; height: 50px; outline-offset: 4px; box-shadow: 0 0 0 2px white;">' . $reply->user->abbreviation() . '</div>'
            !!}
            <div class="media-body">
                <span class="float-right">{{ $reply->created_at->diffForHumans() }}</span>
            <h5 class="mt-0">{{ $reply->user->name() }}</h5>
            {!! $reply->body !!}
            </div>
        </div>
        @endforeach

    </div>
</div>
@endforeach