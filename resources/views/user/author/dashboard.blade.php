@extends('layouts.user')

@section('section', 'Author Panel')
@section('title', 'Dashboard')

@section('content')
@component('components.auth.page')
@component('components.auth.content.dashboard.affiliate-link') @endcomponent

<div class="row mb-4 mb-lg-5">
    @component('components.auth.content.dashboard.box', ['class' => 'pr-lg-2', 'bgColor' => 'oranger', 'color' => 'white', 'title' => 'Balance', 'icon' => 'fas fa-wallet']) <span class="fas fa-dollar-sign"></span> {{ $balance }} @endcomponent
    @component('components.auth.content.dashboard.box', ['class' => 'px-lg-2', 'bgColor' => 'mydarkblue', 'color' => 'white', 'title' => 'Commissions', 'icon' => 'fas fa-money-bill-wave']) <span class="fas fa-dollar-sign"></span> 0 @endcomponent
    @component('components.auth.content.dashboard.box', ['class' => 'px-lg-2', 'bgColor' => 'green', 'color' => 'white', 'title' => 'My Team', 'icon' => 'fas fa-users']) {{ count($team) }} <span class="text-medium">member{{ count($team) > 1 ? 's' : '' }}</span> @endcomponent
    @component('components.auth.content.dashboard.box', ['class' => 'pl-lg-2', 'bgColor' => 'darkblue', 'color' => 'white', 'title' => 'My Posts', 'icon' => 'fas fa-book']) {{ count($posts) }} <span class="text-medium">post{{ count($posts) > 1 ? 's' : '' }}</span> @endcomponent
</div>

<div class="row">
    @component('components.auth.content.dashboard.item', ['size' => 'col-lg-7 mb-4', 'bgColor' => 'white', 'color' => 'dark', 'headBgColor' => 'black-10', 'borderColor' => 'black-20', 'icon' => 'fas fa-users text-oranger', 'title' => 'My Team'])
    @component('components.auth.content.table', $teamTable)
    @endcomponent
    <div>
        <a href="{{ route('user.team') }}" class="text-green">Show all entries</a>
    </div>
    @endcomponent

    @component('components.auth.content.dashboard.item', ['size' => 'col-lg-5 mb-4', 'bgColor' => 'white', 'color' => 'dark', 'headBgColor' => 'black-10', 'borderColor' => 'black-20', 'icon' => 'fas fa-money-bill-wave text-green', 'title' => 'Commissions'])
    <div class="row mx-0 mb-4">
        <div class="col-3 text-green py-1 font-weight-bold border-right border-bottom border-black-20">Date</div>
        <div class="col-3 text-green py-1 font-weight-bold border-right border-bottom border-black-20">User ID</div>
        <div class="col-3 text-green py-1 font-weight-bold border-right border-bottom border-black-20">Amount</div>
        <div class="col-3 text-green py-1 font-weight-bold border-right border-bottom border-black-20">Action</div>

        <div class="col-3 border-right border-bottom border-black-20">
            <div class="py-1 overflow-hidden text-truncate">Date</div>
        </div>
        <div class="col-3 border-right border-bottom border-black-20">
            <div class="py-1 overflow-hidden text-truncate">User ID</div>
        </div>
        <div class="col-3 border-right border-bottom border-black-20">
            <div class="py-1 overflow-hidden text-truncate">Amount</div>
        </div>
        <div class="col-3 border-right border-bottom border-black-20">
            <div class="py-1 overflow-hidden text-truncate">Action</div>
        </div>
    </div>
    @endcomponent

    @if (Auth::user()->sponsor())
        @component('components.auth.content.dashboard.item', ['size' => 'col-lg-6 mb-4', 'bgColor' => 'white', 'color' => 'dark', 'headBgColor' => 'black-10', 'borderColor' => 'black-20', 'icon' => 'fas fa-user-friends text-purered', 'title' => 'Sponsor Information'])
        <div class="row small align-items-center">
            <div class="col-7">
                <div class="row mx-0 mb-4">
                    <div class="col-4 text-green py-1 font-weight-bold border-right border-bottom border-black-20">Title</div>
                    <div class="col-8 text-green py-1 font-weight-bold border-right border-bottom border-black-20">Details</div>

                    <div class="col-4 border-right border-bottom border-black-20">
                        <div class="py-1 overflow-hidden text-truncate">User ID</div>
                        <div class="py-1 overflow-hidden text-truncate">Name</div>
                        <div class="py-1 overflow-hidden text-truncate">E-Mail Address</div>
                        <div class="py-1 overflow-hidden text-truncate">Mobile</div>
                    </div>
                    <div class="col-8 border-right border-bottom border-black-20">
                        <div class="py-1 overflow-hidden text-truncate">{{ Auth::user()->sponsor()->ref }}</div>
                        <div class="py-1 overflow-hidden text-truncate">{{ Auth::user()->sponsor()->name() }}</div>
                        <div class="py-1 overflow-hidden text-truncate">{{ Auth::user()->sponsor()->email }}</div>
                        <div class="py-1 overflow-hidden text-truncate">{{ Auth::user()->sponsor()->phone }}</div>
                    </div>
                </div>
                <a href="#" class="btn btn-green">
                    <i class="fas fa-phone-square mr-2"></i>Call Now
                </a>
            </div>
            <div class="col-5 d-flex justify-content-center">
                <div class="rounded-sm embed-responsive embed-responsive-1by1 position-relative">
                    @if (Auth::user()->sponsor()->photo)
                        <img src="{{ asset(Auth::user()->sponsor()->photo) }}" alt="{{ Auth::user()->sponsor()->name() }}" class="img-fluid">
                    @else
                        <div class="d-flex position-absolute justify-content-center align-items-center font-weight-bold text-white text-montserrat bg-black display-4 w-100 h-100" style="top: 0; left: 0;">{{ Auth::user()->sponsor()->abbreviation() }}</div>
                    @endif
                </div>
            </div>
        </div>
        @endcomponent
    @endif
</div>
@endcomponent
@endsection
