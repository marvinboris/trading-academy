@extends('layouts.app')

@section('content')
    @component('components.banner', ['title' => $content['title']])
    @endcomponent
    @component('components.section', [
        'bgColor' => 'light',
        'fontColor' => 'dark',
        'title' => [
            'color' => 'green',
            'text' => $content['blog']['title']
        ],
        'subtitle' => $content['blog']['description']
    ])
        <div class="row">
            @foreach ($posts as $post)
                @component('components.post', $post)
                {{ $post['body'] }}
                @endcomponent
            @endforeach
        </div>
    @endcomponent
@endsection