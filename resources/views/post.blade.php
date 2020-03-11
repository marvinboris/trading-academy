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