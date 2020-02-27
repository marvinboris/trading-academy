@extends('layouts.user')

@section('section', 'Courses')
@section('title', 'Courses List')

@section('content')
@component('components.auth.page')
<div class="row align-items-end">
    @foreach ($coursesArray as $course)
        @component('components.course', $course)
        @endcomponent
    @endforeach
</div>
@endcomponent
@endsection

@section('scripts')
<script>
    $(function () {
        $('.level-card .trader-level').hide().removeClass('d-none');
        $('.level-card .card').hover(function () {
            const current = $(this);
            current.parent().children('.trader-level').stop().show('fast');
            current.find('.flex-nowrap').stop().animate({ left: 0 }, 'fast');
        }, function () {
            const current = $(this);
            current.parent().children('.trader-level').stop().hide('fast');
            current.find('.flex-nowrap').stop().animate({ left: '-100%' }, 'fast');
        });
    });
</script>
@endsection