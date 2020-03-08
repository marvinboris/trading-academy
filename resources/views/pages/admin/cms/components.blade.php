@extends('layouts.admin')

@section('section', 'CMS')
@section('title', 'Components')

@section('content')
@component('components.auth.pages.admin.page')
<form action="{{ route('admin.cms.components.post') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-xl-2 col-lg-3 col-md-4">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @foreach ($languages as $key => $language)
                <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="v-pills-{{ $language->lang }}-tab" data-toggle="pill" href="#v-pills-{{ $language->lang }}" role="tab" aria-controls="v-pills-{{ $language->lang }}" aria-selected="true">{{ $language->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="col-xl-10 col-lg-9 col-md-8">
            <div class="tab-content" id="v-pills-tabContent">
                @foreach ($languages as $langKey => $language)
                <div class="tab-pane fade show {{ $langKey == 0 ? 'active' : '' }}" id="v-pills-{{ $language->lang }}" role="tabpanel" aria-labelledby="v-pills-{{ $language->lang }}-tab">
                    <ul class="nav nav-pills mb-3" id="pills-tab-{{ $language->lang }}" role="tablist">
                        @foreach ($page_content[$language->lang]['components'] as $compKey => $component)
                        <li class="nav-item">
                            <a class="nav-link {{ $compKey == 'post' ? 'active' : '' }}" id="pills-{{ $language->lang }}-{{ $compKey }}-tab" data-toggle="pill" href="#pills-{{ $language->lang }}-{{ $compKey }}" role="tab" aria-controls="pills-{{ $language->lang }}-{{ $compKey }}" aria-selected="true">{{ ucwords($compKey) }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="pills-{{ $language->lang }}-tabContent">
                        <div class="tab-pane fade show active" id="pills-{{ $language->lang }}-post" role="tabpanel" aria-labelledby="pills-{{ $language->lang }}-post-tab">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-components-post-read-more" class="control-label">Read More</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[components][post][read_more]" id="{{ $language->lang }}-components-post-read-more" class="form-control" value="{!! $page_content[$language->lang]['components']['post']['read_more'] !!}" required>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-{{ $language->lang }}-course" role="tabpanel" aria-labelledby="pills-{{ $language->lang }}-course-tab">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-components-course-enroll-now" class="control-label">Enroll Now</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[components][course][enroll_now]" id="{{ $language->lang }}-components-course-enroll-now" class="form-control" value="{!! $page_content[$language->lang]['components']['course']['enroll_now'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-components-course-duration" class="control-label">Duration</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[components][course][duration]" id="{{ $language->lang }}-components-course-duration" class="form-control" value="{!! $page_content[$language->lang]['components']['course']['duration'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-components-course-hrs" class="control-label">Hrs</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[components][course][hrs]" id="{{ $language->lang }}-components-course-hrs" class="form-control" value="{!! $page_content[$language->lang]['components']['course']['hrs'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-components-course-difficulty" class="control-label">Difficulty</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[components][course][difficulty]" id="{{ $language->lang }}-components-course-difficulty" class="form-control" value="{!! $page_content[$language->lang]['components']['course']['difficulty'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-components-course-reviews" class="control-label">Reviews</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[components][course][reviews]" id="{{ $language->lang }}-components-course-reviews" class="form-control" value="{!! $page_content[$language->lang]['components']['course']['reviews'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-components-course-certificate" class="control-label">Certificate</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[components][course][certificate]" id="{{ $language->lang }}-components-course-certificate" class="form-control" value="{!! $page_content[$language->lang]['components']['course']['certificate'] !!}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="{{ $language->lang }}-components-course-yes" class="control-label">Yes</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="{{ $language->lang }}[components][course][yes]" id="{{ $language->lang }}-components-course-yes" class="form-control" value="{!! $page_content[$language->lang]['components']['course']['yes'] !!}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 offset-xl-2 offset-lg-3 offset-md-4">
                    <button class="btn btn-green">Save <i class="fas fa-arrow-circle-right ml-2"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
@endcomponent
@endsection