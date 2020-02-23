<header class="px-md-5 d-flex align-items-center bg-header position-sticky shadow" style="height: 95px; top: -35px; z-index: 1100;">
    <nav class="navbar navbar-expand-md navbar-dark flex-fill position-sticky" style="top: -35px;">
        <a href="{{ url('/') }}" class="d-block position-sticky" style="top: 10px; height: 60px;">
            <img src="{{ asset('/images/Groupe 130@2x.png') }}" class="h-100" alt="Logo">
        </a>

        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-flex justify-content-end ml-auto align-items-center">
            <div class="mr-md-4">
                <div class="text-white text-montserrat pl-2 d-none d-md-block">
                    <span class="mr-3">
                        <i class="far fa-envelope text-yellow"></i>
                        contact@globalacademy.com
                    </span>
                    <span>
                        <i class="fas fa-phone-square text-yellow"></i>
                        +237 123 456 789
                    </span>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="height: 44px;">
                    <ul class="navbar-nav d-flex align-items-center position-relative pt-2 text-montserrat-alt">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ !Request::segment(1) ? 'active' : '' }}" href="{{ url('/') }}">
                                <span>
                                    <i class="fas fa-home fa-xs"></i>
                                    Home
                                </span>
                                
                            </a>
                            <div id="lil-point" class="bg-yellow position-absolute border-radius"></div>
                        </li>
                        <li class="nav-item">
                            <div id="courses" class="nav-link text-white {{ Request::segment(1) === 'courses' ? 'active' : '' }}">
                                <span>Courses</span>
                                <div class="py-2 rounded bg-light position-absolute" style="top: calc(100%);">
                                    <a class="dropdown-item {{ Request::segment(1) === 'courses' && Request::segment(2) === 'bronze' ? 'active' : '' }}" href="{{ route('courses.show', 'bronze') }}">Bronze</a>
                                    <a class="dropdown-item {{ Request::segment(1) === 'courses' && Request::segment(2) === 'silver' ? 'active' : '' }}" href="{{ route('courses.show', 'silver') }}">Silver</a>
                                    <a class="dropdown-item {{ Request::segment(1) === 'courses' && Request::segment(2) === 'diamond' ? 'active' : '' }}" href="{{ route('courses.show', 'diamond') }}">Diamond</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::segment(1) === 'about-us' ? 'active' : '' }}" href="{{ route('about-us') }}">
                                <span>About Us</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::segment(1) === 'contact' ? 'active' : '' }}" href="{{ route('contact') }}">
                                <span>Contact</span>
                            </a>
                        </li>
                        <li class="nav-item position-relative text-montserrat">
                            <div class="text-white ml-1 px-1">
                                <a href="#language-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="language-dropdown" class="text-white text-decoration-none d-flex justify-content-around align-items-center">
                                    <span class="language-flag shadow-lg d-inline-flex mr-1 justify-content-center align-items-center overflow-hidden">
                                        <img src="{{ session('lang') === 'en' ? asset('/images/641ad9571c9ade545faf3ef16810b143.png') : asset('/images/1.jpg') }}" class="h-100" alt="en-flag">
                                    </span>
                                    <span class="px-1 border-left border-white-50">{{ session('lang') === 'en' ? 'En' : 'Fr' }}</span>
                                    <i class="fas fa-caret-down"></i>
                                </a>
                            </div>
                            <div id="language-dropdown" class="collapse position-absolute">
                                <div class="p-2 rounded bg-white border position-absolute" style="top: calc(100% + 5px);">
                                    <a href="{{ session('lang') === 'en' ? url('fr') : url('en') }}" class="rounded-lg ml-1 px-1 d-flex justify-content-around align-items-center text-black-50 text-decoration-none">
                                        <span class="language-flag shadow-lg d-inline-flex mr-1 justify-content-center align-items-center overflow-hidden">
                                            <img src="{{ session('lang') === 'en' ? asset('/images/1.jpg') : asset('/images/641ad9571c9ade545faf3ef16810b143.png') }}" class="h-100" alt="fr-flag">
                                        </span>
                                        <span class="mr-1">{{ session('lang') === 'en' ? 'Fr' : 'En' }}</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="live-chat-text" style="height: 75px;">
                <a href="#" class="text-yellow font-weight-bold position-sticky text-medium" style="top: 20px;">
                    <i class="fas fa-headset mr-2"></i><span class="text-montserrat">LiveChat</span>
                </a>
            </div>
            <div class="ml-md-4">
                <div class="mb-3 d-none d-md-block">
                    <div class="d-flex justify-content-center">
                        <a href="#" class="fab fa-lg fa-facebook-square text-white text-decoration-none"></a>
                        <a href="#" class="fab fa-lg fa-twitter-square text-white text-decoration-none ml-2"></a>
                        <a href="#" class="fab fa-lg fa-linkedin text-white text-decoration-none ml-2"></a>
                        <a href="#" class="fab fa-lg fa-skype text-white text-decoration-none ml-2"></a>
                    </div>
                </div>
                <div>
                    @guest
                    <a href="{{ route('login') }}" class=" sign-in-btn btn btn-light text-green rounded-sm font-weight-bold text-x-small">
                        Sign In <i class=" fas fa-sign-in-alt fa-lg ml-2"></i>
                    </a>
                    @else
                    <div class="dropdown text-white">
                        <a href="#" class="pl-2 pb-1 dropdown-toggle d-flex align-items-center text-decoration-none text-reset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="pr-1">
                                {!! Auth::user()->photo ? 
                                '<img src="' . asset(Auth::user()->photo) .'" alt="User" class="rounded-circle img-fluid" style="width: 32px; height: 32px;">'
                                : 
                                '<div class="d-flex justify-content-center align-items-center font-weight-bold text-white text-montserrat rounded-circle bg-black-50 text-x-small" style="width: 32px; height: 32px; outline-offset: 4px; box-shadow: 0 0 0 2px white;">' . Auth::user()->abbreviation() . '</div>'
                                !!}
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route(strtolower(Auth::user()->role->name) . '.dashboard') }}" class="dropdown-item {{ Request::segment(2) === 'dashboard' ? 'active' : null }}"><i class="fas mr-2 fa-tachometer-alt"></i>Dashboard</a>                            
                            <a class="dropdown-item border-top" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off mr-2"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</header>
