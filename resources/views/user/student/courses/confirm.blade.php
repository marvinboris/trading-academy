@extends('layouts.user')

@section('section', 'Courses')
@section('parent') <a href="{{ route('student.courses.index') }}" class="text-green text-900">Courses List</a> @endsection
@section('title', 'Buy a Course')

@section('content')
@component('components.auth.page')
<div class="card bg-darkblue text-white text-montserrat">
    <div class="card-img-top">
        <div class="col-12 py-3">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <div>
                        <img src="{{ asset('/images/Groupe 130@2x.png') }}" height="60" alt="Logo">
                    </div>
                    <div>
                        <strong class="text-700">Global Investment Trading Academy</strong>
                    </div>
                    <div>
                        Douala - Cameroon, Rue Mandessi Bell Bali, Kayo Elie
                    </div>    
                </div>
                
                <div class="text-right">
                    <h2 class="text-700">Purchase Order No :</h2>
                    <div>{{ Carbon\Carbon::now()->format('d-M-Y') }}</div>
                    <div><strong class="text-700">{{ Auth::user()->name() }}</strong></div>
                    <div>{{ Auth::user()->email }}</div>
                    <div>{{ Auth::user()->phone }}</div>
                    <div><u>Account :</u> {{ Auth::user()->ref }}</div>
                </div>
            </div>
            <div>
                <div class="table-responsive">
                    <table class="table table-bordered text-white">
                        <thead>
                            <tr>
                                <th scope="col">Course Name</th>
                                <th scope="col">Details</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $courseData->title }}</td>
                                <td>
                                    @if ($new == 1)
                                        @switch($payment)
                                            @case('preregistration')
                                                Preregistration
                                                @break
                                            @case('first-installment')
                                                Preregistration & first installment
                                                @break
                                            @default
                                                Pay Cash
                                        @endswitch
                                    @else
                                        @switch($payment)
                                            @case('first-installment')
                                                First installment
                                                @break
                                            @default
                                                Second installment
                                        @endswitch
                                    @endif
                                </td>
                                <td>{{ $price }}</td>
                            </tr>
                            <tr>
                                <td class="text-700" colspan="2">Total</td>
                                <td>{{ $price }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body bg-light py-2">
        <div class="d-flex justify-content-end">
            <form method="post" action="{{ route('student.courses.confirmed') }}">
                @csrf
                <input type="hidden" name="hash" value="{{ $hash }}">
                <button class="btn btn-green">Confirm</button>
                <button class="btn btn-oranger">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endcomponent
@endsection