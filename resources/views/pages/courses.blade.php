@extends('layouts.app')

@section('content')
    @component('components.banner', ['title' => 'Courses'])
    @endcomponent
    @component('components.section', [
        'bgColor' => 'light',
        'fontColor' => 'dark',
        'title' => [
            'color' => 'green',
            'text' => 'Courses'
        ],
        'subtitle' => 'Find out information about all of our courses !'
    ])
        <div class="row">
            @foreach ($courses as $course)
                @component('components.course', $course)
                @endcomponent
            @endforeach
        </div>
    @endcomponent
@endsection