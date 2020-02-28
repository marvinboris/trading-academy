@extends('layouts.user')

@section('section', 'Courses')
@section('parent') <a href="{{ route('student.courses.index') }}" class="text-green text-900">Courses List</a> @endsection
@section('title', 'Choose Session')

@section('content')
@component('components.auth.page')
<div class="row">
    @component('components.course', $courseArray)
    @endcomponent
    <div class="col-xl-8">
        <div class="list-group text-montserrat">
            @foreach ($sessions as $session)
            <form method="get" action="{{ route('student.courses.confirm', ['course' => $courseArray['slug'], 'session' => $session->id]) }}" class="list-group-item list-group-item-action">
                <input type="hidden" name="new" value="1">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div>From : <strong>{{ $session->start->format('D, d M Y') }}</strong></div>
                        <div>To : <strong>{{ $session->end->format('D, d M Y') }}</strong></div>
                        <div>
                            <strong class="text-x-large">{{ $session->places }}</strong> places left
                        </div>
                    </div>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="preregistration" checked name="payment" value="preregistration" class="custom-control-input">
                            <label class="custom-control-label" for="preregistration">Preregistration</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="first-installment" name="payment" value="first-installment" class="custom-control-input">
                            <label class="custom-control-label" for="first-installment">Preregistration & first installment</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="cash" name="payment" value="cash" class="custom-control-input">
                            <label class="custom-control-label" for="cash">Pay cash</label>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <button class="btn btn-green btn-lg">Pay</button>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endcomponent
@endsection