@extends('layouts.admin')

@section('content')
<section class="d-flex align-items-center py-3 justify-content-center">
    <div class="mr-2">
        Affiliate link :
    </div>
    <div>
        <div class="input-group">
           <input type="text" class="form-control" value="{{ route('register') . '/?ref=' . Auth::user()->ref }}" readonly>
           <div class="input-group-append">
                <button class="btn btn-green">Copy</button>   
            </div> 
        </div>
    </div>
</section>

<section class="border bg-white p-3">
    <div class="pb-2 mb-3 border-bottom d-flex justify-content-between">
        <strong class="d-inline-flex align-items-center text-x-large">
            <i class="fas fa-dollar-sign fa-lg mr-2"></i>
            <div>Account info</div>
        </strong>
    </div>
    <div class="row">
        @component('components.auth.content.dashboard-item', ['bgColor' => 'orange', 'color' => 'white', 'title' => 'Total Posts', 'icon' => 'fas fa-mail-bulk']) 0 @endcomponent
        @component('components.auth.content.dashboard-item', ['bgColor' => 'green', 'color' => 'white', 'title' => 'Team Members', 'icon' => 'fas fa-users']) 0 @endcomponent
        @component('components.auth.content.dashboard-item', ['bgColor' => 'danger', 'color' => 'white', 'title' => 'Total Messages', 'icon' => 'fas fa-envelope']) 0 @endcomponent
        @component('components.auth.content.dashboard-item', ['bgColor' => 'darkblue', 'color' => 'white', 'title' => 'Total Notifications', 'icon' => 'fas fa-bell']) 0 @endcomponent
    </div>
</section>
@endsection