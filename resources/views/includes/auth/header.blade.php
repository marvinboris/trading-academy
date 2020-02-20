<div class="bg-mydarkblue">
    <div class="d-flex px-3 align-items-center justify-content-between bg-black text-white">
        <div>
            <div class="d-flex align-items-center">
                <div class="pr-4">
                    <i class="fas fa-align-left fa-fw fa-2x text-white-50"></i>
                </div>
                
                <div class="d-flex">
                    <div class="pt-2 pr-3">
                        <div class="py-2">
                            <i class="fas fa-tachometer-alt fa-lg text-orange"></i>
                        </div>
                    </div>
                    <div class="py-2 text-montserrat-alt">
                        <div class="py-1 font-weight-bold text-white text-large">Dashboard</div>
                        <div class="text-muted">@yield('section')</div>
                    </div>
                </div>
            </div>
        </div>
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
                    <span class="badge rounded-circle badge-warning bg-orange text-white position-relative p-1" style="top: -10px; left: -10px; font-size: 50%;">0</span>
                    <div class="card collapse position-absolute text-dark" id="notifications" style="width: 18rem; right: 0; z-index: 1200;">
                        <div class="card-header py-2 px-3">
                            You have 0 notifications
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item py-2 px-3">
                                <div class="text-truncate">
                                    <i class="text-danger fa fa-bell"></i> New subscriber : <strong>{{ 'admin@demo.com' }}</strong>
                                </div>
                            </li>
                        </ul>
                        <a href="#" class="card-footer small p-2 text-center">
                            View all notifications
                        </a>
                    </div>
                </div>
    
                <div class="px-3">
                    <a href="#" class="pl-2 dropdown-toggle d-flex align-items-center dropdown-toggle-split text-decoration-none text-reset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="pr-1">
                            {!! Auth::user()->photo ? 
                            '<img src="' . Auth::user()->photo .'" alt="User" class="rounded-circle img-fluid" style="width: 32px; height: 32px;">'
                            : 
                            '<div class="d-flex justify-content-center align-items-center font-weight-bold text-white text-montserrat rounded-circle bg-black-50 text-x-small" style="width: 32px; height: 32px; outline-offset: 4px; box-shadow: 0 0 0 2px white;">' . Auth::user()->abbreviation() . '</div>'
                            !!}
                        </div>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route(strtolower(Auth::user()->role->name) . '.dashboard') }}" class="dropdown-item {{ Request::segment(2) === 'dashboard' ? 'active' : null }}"><i class="fa mr-2 fa-dashboard"></i>Dashboard</a>                            
                        <a class="dropdown-item border-top" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off mr-2"></i> {{ __('Logout') }}
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
