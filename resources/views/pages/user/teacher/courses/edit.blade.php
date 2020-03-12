@extends('layouts.user')

@section('section', 'Courses')
@section('parent') <a href="{{ route('teacher.courses.index') }}" class="text-green text-900">My Courses</a> @endsection
@section('title', 'Edit a Course')

@section('content')
@component('components.auth.page')
<form action="{{ route('teacher.courses.update', $course->id) }}" method="post" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-9">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" id="basics-tab" data-toggle="tab" href="#basics" role="tab" aria-controls="basics" aria-selected="true">Basics</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="what-you-will-learn-tab" data-toggle="tab" href="#what-you-will-learn" role="tab" aria-controls="what-you-will-learn" aria-selected="false">What you will learn</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="course-content-tab" data-toggle="tab" href="#course-content" role="tab" aria-controls="course-content" aria-selected="false">Course content</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="requirements-tab" data-toggle="tab" href="#requirements" role="tab" aria-controls="requirements" aria-selected="false">Requirements</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="false">Description</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="includes-tab" data-toggle="tab" href="#includes" role="tab" aria-controls="includes" aria-selected="false">Includes</a>
                </li>
            </ul>
            <div class="tab-content border-right" id="myTabContent">
                <div class="tab-pane py-3 fade show overflow-hidden active" id="basics" role="tabpanel" aria-labelledby="basics-tab">
                    <div class="form-group row mx-0">
                        <div class="col-md-3">
                            <label for="title" class="control-label">Title</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="title" id="title" class="form-control" value="{{ $course->title }}" required>
                        </div>
                    </div>
                    <div class="form-group row mx-0">
                        <div class="col-md-3">
                            <label for="price" class="control-label">Price</label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" name="price" id="price" class="form-control" value="{{ $course->price }}" required>
                        </div>
                    </div>
                    <div class="form-group row mx-0">
                        <div class="col-md-3">
                            <label for="duration" class="control-label">Duration</label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" name="duration" id="duration" class="form-control" value="{{ $course->duration }}" required>
                        </div>
                    </div>
                    <div class="form-group row mx-0">
                        <div class="col-md-3">
                            <label for="level_rank" class="control-label">Level Rank</label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" max="3" min="1" name="level_rank" id="level_rank" class="form-control" value="{{ $course->level_rank }}" required>
                        </div>
                    </div>
                    <div class="form-group row mx-0">
                        <div class="col-md-3">
                            <label for="level_name" class="control-label">Level Name</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="level_name" id="level_name" class="form-control" value="{{ $course->level_name }}" required>
                        </div>
                    </div>
                    <div class="form-group position-relative row mx-0" style="left: -100%;">
                        <div class="col-md-3">
                            <label for="photo" class="control-label">Photo</label>
                        </div>
                        <div class="col-md-9">
                            <input type="file" name="photo" id="photo" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="tab-pane py-3 fade" id="what-you-will-learn" role="tabpanel" aria-labelledby="what-you-will-learn-tab">
                    <div class="form-group row mx-0">
                        <div class="col-12">
                            @foreach ($course->what_you_will_learn as $item)
                            <div class="d-flex mb-3">
                                <input type="text" name="what_you_will_learn[]" class="form-control" value="{{ $item }}" required>
                                <button type="button" class="btn btn-transparent p-0 text-blue ml-1 add"><span class="fa-stack fa-1x"><i class="fas fa-circle fa-stack-2x"></i><i class="fas fa-plus fa-stack-1x fa-inverse"></i></span></button>
                                <button type="button" class="btn btn-transparent p-0 text-purered delete"><span class="fa-stack fa-1x"><i class="fas fa-circle fa-stack-2x"></i><i class="fas fa-minus fa-stack-1x fa-inverse"></i></span></button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane py-3 fade" id="course-content" role="tabpanel" aria-labelledby="course-content-tab">
                    <div class="form-group row mx-0">
                        @foreach ($course->course_content as $key => $item)
                        <div class="col-12">
                            <label class="control-label title text-large">Section {{ $key + 1 }}</label>
                            <button type="button" class="btn btn-transparent p-0 text-blue ml-1 add section"><span class="fa-stack fa-1x"><i class="fas fa-circle fa-stack-2x"></i><i class="fas fa-plus fa-stack-1x fa-inverse"></i></span></button>
                            <button type="button" class="btn btn-transparent p-0 text-purered delete section"><span class="fa-stack fa-1x"><i class="fas fa-circle fa-stack-2x"></i><i class="fas fa-minus fa-stack-1x fa-inverse"></i></span></button>
                            <div class="row mb-3">
                                <div class="col md-3">
                                    <label for="course_content[{{ $key }}][title]" class="control-label">Title</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="course_content[{{ $key }}][title]" value="{{ $course->course_content[$key]->title }}" class="form-control title">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col md-3">
                                    <label for="course_content[{{ $key }}][content]" class="control-label">Content</label>
                                </div>
                                <div class="col-md-9">
                                    @foreach ($item->content as $subitem)
                                    <div class="d-flex mb-3">
                                        <input type="text" name="course_content[{{ $key }}][content][]" class="form-control subitem" value="{{ $subitem }}" required>
                                        <button type="button" class="btn btn-transparent p-0 text-blue ml-1 add"><span class="fa-stack fa-1x"><i class="fas fa-circle fa-stack-2x"></i><i class="fas fa-plus fa-stack-1x fa-inverse"></i></span></button>
                                        <button type="button" class="btn btn-transparent p-0 text-purered delete"><span class="fa-stack fa-1x"><i class="fas fa-circle fa-stack-2x"></i><i class="fas fa-minus fa-stack-1x fa-inverse"></i></span></button>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane py-3 fade" id="requirements" role="tabpanel" aria-labelledby="requirements-tab">
                    <div class="form-group row mx-0">
                        <div class="col-12">
                            @foreach ($course->requirements as $item)
                            <div class="d-flex mb-3">
                                <input type="text" name="requirements[]" class="form-control" value="{{ $item }}" required>
                                <button type="button" class="btn btn-transparent p-0 text-blue ml-1 add"><span class="fa-stack fa-1x"><i class="fas fa-circle fa-stack-2x"></i><i class="fas fa-plus fa-stack-1x fa-inverse"></i></span></button>
                                <button type="button" class="btn btn-transparent p-0 text-purered delete"><span class="fa-stack fa-1x"><i class="fas fa-circle fa-stack-2x"></i><i class="fas fa-minus fa-stack-1x fa-inverse"></i></span></button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane py-3 fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="col-12">
                        <textarea name="description" id="description" class="form-control summernote">{!! $course->description !!}</textarea>
                    </div>
                </div>
                <div class="tab-pane py-3 fade" id="includes" role="tabpanel" aria-labelledby="includes-tab">
                    <div class="form-group row mx-0">
                        <div class="col-12">
                            @foreach ($course->includes as $key => $item)
                            <div class="d-flex mb-3">
                                <div class="col-md-3">
                                    <label for="includes-{{ $key }}" class="control-label">{{ ucwords($key) }}</label>
                                </div>
                                <input type="text" name="includes[{{ $key }}]" id="includes-{{ $key }}" class="form-control" value="{{ $item }}" required>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-4 bg-white border mb-3">
                <div class="border rounded-circle embed-responsive embed-responsive-1by1 mb-3" style="background: url('{{ asset($course->photo->path) }}') no-repeat center; background-size: cover;"></div>
                <div class="text-center">
                    <a href="#" id="upload" data-target="photo" class="text-green">Click to upload image</a>
                </div>
            </div>
            <div class="text-center text-montserrat px-3">
                <div><button type="submit" class="btn btn-block btn-green font-weight-bold mb-3">Save</button></div>
                <div><a href="{{ route('teacher.courses.index') }}" class="btn btn-block btn-orange font-weight-bold">Cancel</a></div>
            </div>
        </div>
    </div>
</form>
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

            const deleteBtnEvent = function () {
                const current = $(this);
                current.parent().remove();

                if (current.hasClass('section')) {
                    const parents = current.parent().parent().children('.col-12');
                    parents.each(function (index) {
                        const elem = $(this);
                        elem.find('label.title').html('Section ' + (index + 1));
                        elem.find('label:not(.text-large)').attr('for', "course_content[" + index + "]['title']");
                        elem.find('input.title').attr('name', "course_content[" + index + "]['title']");
                        elem.find('input.subitem').attr('name', "course_content[" + index + "]['content'][]");
                    });
                }
            };
            const addBtnEvent = function () {
                const current = $(this);
                const clone = current.parent().clone();
                current.parent().after(clone);
                clone.find('.btn.delete').click(deleteBtnEvent);
                clone.find('.btn.add').click(addBtnEvent);

                if (current.hasClass('section')) {
                    const parents = current.parent().parent().children('.col-12');
                    parents.each(function (index) {
                        const elem = $(this);
                        elem.find('label.title').html('Section ' + (index + 1));
                        elem.find('label:not(.text-large)').attr('for', "course_content[" + index + "]['title']");
                        elem.find('input.title').attr('name', "course_content[" + index + "]['title']");
                        elem.find('input.subitem').attr('name', "course_content[" + index + "]['content'][]");
                    });
                }
            };
            $('.btn.delete').click(deleteBtnEvent);
            $('.btn.add').click(addBtnEvent);
        });
    </script>
@endsection
