<div class="bg-mydarkblue">
    <div class="d-flex px-3 pt-2 pb-2 pb-md-0 align-items-center justify-content-between bg-black text-white">
        <div>
            <div class="d-flex align-items-center">
                <div class="pr-md-4">
                    <i class="fas fa-bars fa-fw fa-2x text-white-50" data-toggle="collapse" data-target="#sidebar"></i>
                </div>

                <div class="d-none d-md-flex">
                    <div class="pr-3">
                        <div class="py-2">
                            <i class="fas fa-tachometer-alt fa-lg text-orange"></i>
                        </div>
                    </div>
                    <div class="pb-2 text-montserrat-alt">
                        <div class="py-1 font-weight-bold text-white text-large">Dashboard</div>
                        <div class="text-muted">@yield('section')</div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $unreadNotifications = Auth::user()->unreadNotifications;
            $notifications = Auth::user()->notifications()->latest()->limit(5)->get();
        @endphp

        <div>
            <div class="d-flex justify-content-end align-items-center">
                <div class="pl-3 position-relative border-left border-right">
                    <i class="far fa-lg fa-envelope" id="messages-controller" data-toggle="collapse" data-target="#messages" aria-expanded="false" aria-controls="messages"></i>
                    <span class="badge rounded-circle badge-danger text-white position-relative p-1" style="top: -10px; left: -10px; font-size: 50%;">0</span>
                    <div class="card collapse position-absolute text-dark" id="messages" style="width: 18rem; right: 0; z-index: 1200;">
                        <div class="card-header py-2 px-3">
                            You have 0 messages
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item py-2 px-3">
                                <div>
                                    <h5 class="d-inline">Newsletter</h5>
                                    <span class="float-right small text-muted">
                                        {{ now() }}
                                    </span>
                                    <div class="text-muted text-truncate">
                                        New subscriber : <strong>{{ 'demo@admin.com' }}</strong>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <a href="#" class="card-footer small p-2 text-center">
                            View all messages
                        </a>
                    </div>
                </div>

                <div class="pl-3 position-relative border-right">
                    <i class="fas fa-lg fa-bell" id="notifications-controller" data-toggle="collapse" data-target="#notifications" aria-expanded="false" aria-controls="notifications"></i>
                    <span class="badge rounded-circle badge-warning bg-orange text-white position-relative p-1" style="top: -10px; left: -10px; font-size: 50%;">{{ count($unreadNotifications) }}</span>
                    <div class="card collapse position-absolute text-dark" id="notifications" style="width: 18rem; right: 0; z-index: 1200;">
                        <div class="card-header py-2 px-3">
                            You have {{ count($unreadNotifications) }} notification{{ count($unreadNotifications) > 1 ? 's' : '' }}
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($notifications as $key => $notification)
                            <li class="list-group-item py-2 px-3">
                                <div class="text-truncate">
                                    @switch($notification->type)
                                        @case('App\Notifications\NewTeamMember')
                                            <i class="text-orange fas fa-bell fa-fw"></i><strong>{{ App\User::find($notification->data['user_id'])->name() }}</strong> just joined your team.
                                            @break
                                        @case('App\Notifications\Commission')
                                            <i class="text-orange fas fa-bell fa-fw"></i>You received a referral commission of <strong>${{ App\Commission::find($notification->data['commission_id'])->amount }}</strong>.
                                            @break
                                    @endswitch
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <a href="#" class="card-footer small p-2 text-center">
                            View all notifications
                        </a>
                    </div>
                </div>

                <div class="px-3">
                    <a class="text-decoration-none text-reset" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off fa-2x"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
