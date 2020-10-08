@extends('layouts.app')

@section('content')
@component('components.banner', ['title' => $content['title']])
@endcomponent

@section('styles')
<meta name="description" content="Posez-nous vos questions sur GIT Trading Academy Cameroun." />
@endsection

@component('components.section', [
    'bgColor' => 'light',
    'fontColor' => 'dark',
    'title' => [
        'color' => 'green',
        'text' => ''
    ],
    'subtitle' => ''
])
    <div class="accordion" id="faq-accordion">
        @foreach ($content['content'] as $sectionIndex => $section)
        <h2>{{ $section['title'] }}</h2>
        <div class="mb-4">
            @foreach ($section['content'] as $itemIndex => $item)
            <div class="card">
                <div class="card-header bg-green" id="heading-{{ $sectionIndex }}-{{ $itemIndex }}">
                    <button class="btn btn-link d-block w-100 text-left text-white" type="button" data-toggle="collapse" data-target="#collapse-{{ $sectionIndex }}-{{ $itemIndex }}" aria-expanded="true" aria-controls="collapse-{{ $sectionIndex }}-{{ $itemIndex }}">
                        <strong class="mb-0">
                            {{ $item['title'] }}
                        </strong>
                    </button>
                </div>
            
                <div id="collapse-{{ $sectionIndex }}-{{ $itemIndex }}" class="collapse border-bottom show" aria-labelledby="heading-{{ $sectionIndex }}-{{ $itemIndex }}" data-parent="#faq-accordion">
                    <div class="card-body">
                        {!! $item['body'] !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
            
    </div>
@endcomponent
@endsection

@section('scripts')
<script>
    $(function () {
        $('#faq-accordion .collapse').on('show.bs.collapse', function () {
            $('#faq-accordion .card-header').removeClass('bg-green');
            $('#faq-accordion button').removeClass('text-white');

            const parent = $(this).parent();
            parent
                .find('.card-header').addClass('bg-green')
                .find('button').addClass('text-white');
        });
    });  
</script>    
@endsection