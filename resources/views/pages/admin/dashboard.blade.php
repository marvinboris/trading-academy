@extends('layouts.admin')

@section('section', 'Admin Panel')
@section('title', 'Dashboard')

@section('content')
@component('components.auth.pages.admin.page')
    
<div class="row mb-5">
    @component('components.auth.content.dashboard.box', ['class' => 'pr-2 mb-3', 'bgColor' => 'light', 'color' => 'mydarkblue', 'title' => 'Total Deposit', 'icon' => 'fas fa-dollar-sign']) <span class="fas fa-dollar-sign"></span> {{ $total_deposit }} @endcomponent
    @component('components.auth.content.dashboard.box', ['class' => 'px-2 mb-3', 'bgColor' => 'pink', 'color' => 'white', 'title' => 'Total Users', 'icon' => 'fas fa-users']) {{ $total_users }} @endcomponent
    @component('components.auth.content.dashboard.box', ['class' => 'px-2 mb-3', 'bgColor' => 'oranger', 'color' => 'white', 'title' => 'Paid Commissions', 'icon' => 'fas fa-credit-card']) <span class="fas fa-dollar-sign"></span> {{ $paid_commissions }}</span> @endcomponent
    @component('components.auth.content.dashboard.box', ['class' => 'pl-2 mb-3', 'bgColor' => 'mydarkblue', 'color' => 'white', 'title' => 'Total Withdraw', 'icon' => 'fas fa-hand-holding-usd']) <span class="fas fa-dollar-sign"></span> {{ $total_withdraw }} @endcomponent
    @component('components.auth.content.dashboard.box', ['class' => 'pr-2 mb-3', 'bgColor' => 'primary', 'color' => 'white', 'title' => 'Total Fees', 'icon' => 'fas fa-dollar-sign']) <span class="fas fa-dollar-sign"></span> {{ $total_fees }} @endcomponent
    @component('components.auth.content.dashboard.box', ['class' => 'px-2 mb-3', 'bgColor' => 'scarlet', 'color' => 'white', 'title' => 'Total Paid Courses', 'icon' => 'fas fa-book']) <span class="fas fa-dollar-sign"></span> {{ $paid_courses }} @endcomponent
    @component('components.auth.content.dashboard.box', ['class' => 'px-2 mb-3', 'bgColor' => 'yellow', 'color' => 'white', 'title' => 'Expenses', 'icon' => 'fas fa-money-bill']) <span class="fas fa-dollar-sign"></span> {{ $expenses }} @endcomponent
    @component('components.auth.content.dashboard.box', ['class' => 'pl-2 mb-3', 'bgColor' => 'success', 'color' => 'white', 'title' => 'Available Balance', 'icon' => 'fas fa-wallet']) <span class="fas fa-dollar-sign"></span> {{ $available_balance }} @endcomponent
</div>

<div class="row">
    @component('components.auth.content.dashboard.item', ['size' => 'col-lg-6 mb-4', 'bgColor' => 'white', 'color' => 'dark', 'headBgColor' => 'black-10', 'borderColor' => 'black-20', 'icon' => 'fas fa-money-bill-wave text-green', 'title' => 'Withdraw List'])
    <div class="table-responsive">
        <div class="d-flex">
            <div class="col-3 text-green py-1 font-weight-bold border-right border-bottom border-black-20">Date</div>
            <div class="col-3 text-green py-1 font-weight-bold border-right border-bottom border-black-20">User ID</div>
            <div class="col-3 text-green py-1 font-weight-bold border-right border-bottom border-black-20">Amount</div>
            <div class="col-3 text-green py-1 font-weight-bold border-right border-bottom border-black-20">Verified Status</div>
            <div class="col-3 text-green py-1 font-weight-bold border-right border-bottom border-black-20">Status</div>
        </div>
        <div class="mb-3">
            @foreach ($withdraws as $item)
                <div class="row">
                    <div class="col-3 border-right border-bottom border-black-20">
                        <div class="py-1 overflow-hidden text-truncate">{{ $item->created_at }}</div>
                    </div>
                    <div class="col-3 border-right border-bottom border-black-20">
                        <div class="py-1 overflow-hidden text-truncate">{{ $item->referral }}</div>
                    </div>
                    <div class="col-3 border-right border-bottom border-black-20">
                        <div class="py-1 overflow-hidden text-truncate">{{ $item->amount }}</div>
                    </div>
                    <div class="col-3 border-right border-bottom border-black-20">
                        <div class="py-1 overflow-hidden text-truncate">
                            @if ($item->user->is_verified)
                                <span class="text-purered">Not verified</span>
                            @else
                                <span class="text-success">Verified</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-3 border-right border-bottom border-black-20">
                        <div class="py-1 overflow-hidden text-truncate">
                            @switch($item->status)
                                @case(0)
                                    <span class="btn btn-oranger btn-sm"><i class="fas fa-spin fa-spinner mr-2"></i>Pending</span>
                                    @break
                                @case(1)
                                    <span class="btn btn-purered btn-sm"><i class="fas fa-times-circle mr-2"></i>Failed</span>
                                    @break
                                @default
                                    <span class="btn btn-success btn-sm"><i class="fas fa-check-circle mr-2"></i>Completed</span>
                            @endswitch
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div>
        <a href="{{ route('user.commissions') }}" class="text-green">Show all entries</a>
    </div>
    @endcomponent
    
    @component('components.auth.content.dashboard.item', ['size' => 'col-lg-6 mb-4', 'bgColor' => 'white', 'color' => 'dark', 'headBgColor' => 'black-10', 'borderColor' => 'black-20', 'icon' => 'fas fa-money-bill-wave text-green', 'title' => 'Deposit List'])
    <div class="table-responsive">
        <div class="d-flex">
            <div class="col-3 text-green py-1 font-weight-bold border-right border-bottom border-black-20">User ID</div>
            <div class="col-3 text-green py-1 font-weight-bold border-right border-bottom border-black-20">Name</div>
            <div class="col-3 text-green py-1 font-weight-bold border-right border-bottom border-black-20">Date</div>
            <div class="col-3 text-green py-1 font-weight-bold border-right border-bottom border-black-20">Amount</div>
            <div class="col-3 text-green py-1 font-weight-bold border-right border-bottom border-black-20">Comment</div>
            <div class="col-3 text-green py-1 font-weight-bold border-right border-bottom border-black-20">Action</div>            
        </div>
        <div class="mb-3">
            @foreach ($deposits as $item)
                <div class="d-flex">
                    <div class="col-3 border-right border-bottom border-black-20">
                        <div class="py-1 overflow-hidden text-truncate">{{ $item->user->ref }}</div>
                    </div>
                    <div class="col-3 border-right border-bottom border-black-20">
                        <div class="py-1 overflow-hidden text-truncate">{{ $item->user->name() }}</div>
                    </div>
                    <div class="col-3 border-right border-bottom border-black-20">
                        <div class="py-1 overflow-hidden text-truncate">{{ $item->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="col-3 border-right border-bottom border-black-20">
                        <div class="py-1 overflow-hidden text-truncate">{{ $item->amount }}</div>
                    </div>
                    <div class="col-3 border-right border-bottom border-black-20">
                        <div class="py-1 overflow-hidden text-truncate">{{ $item->comment }}</div>
                    </div>
                    <div class="col-3 border-right border-bottom border-black-20">
                        <div class="py-1 overflow-hidden text-truncate">
                            <a href="{{ route('admin.deposits.show', $item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye mr-1"></i>View</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('user.commissions') }}" class="text-green">Show all entries</a>
    </div>
    @endcomponent
</div>

@endcomponent
@endsection