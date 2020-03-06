<header class="bg-header position-sticky shadow" style="height: 95px; top: -37px; z-index: 1100;">
    <nav class="navbar navbar-expand-md navbar-dark px-md-5 flex-fill position-sticky border-0 h-100 d-flex justify-content-between" style="top: -35px;">
        <a href="{{ url('/') }}" class="d-block position-sticky" style="top: 10px; height: 60px;">
            <img src="{{ asset('/images/Groupe 130@2x.png') }}" class="h-100" alt="Logo">
        </a>

        <div class="d-none d-lg-flex justify-content-end ml-auto align-items-center">
            <div class="mr-md-4">
                <div class="text-white text-montserrat pl-2 d-flex justify-content-start">
                    <span class="mr-4">
                        <i class="far fa-envelope text-yellow"></i>
                        contact@gitacademy.net
                    </span>
                    <span>
                        <i class="fas fa-phone-square text-yellow"></i>
                        +237 655 888 468
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
                                    @php
                                        $courses = App\Course::get();
                                    @endphp
                                    @foreach ($courses as $course)
                                    <a class="dropdown-item {{ Request::segment(1) === 'courses' && Request::segment(2) === $course->slug ? 'active' : '' }}" href="{{ route('courses.show', $course->slug) }}">{{ $course->title }}</a>
                                    @endforeach
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
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::segment(1) === 'faq' ? 'active' : '' }}" href="{{ route('faq') }}">
                                <span>FAQ</span>
                            </a>
                        </li>
                        <li class="nav-item position-relative text-montserrat">
                            <div class="text-white ml-1 px-1">
                                <a href="#language-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="language-dropdown" class="text-white text-decoration-none d-flex justify-content-around align-items-center">
                                    <span class="language-flag shadow-lg mr-1 overflow-hidden d-inline-flex justify-content-center align-items-center position-relative">
                                        <span class="flag-icon position-absolute flag-icon-{{ session('flag') }}"></span>
                                    </span>
                                    <span class="px-1 border-left border-white-50">{{ ucwords(session('lang')) }}</span>
                                    <i class="fas fa-caret-down"></i>
                                </a>
                            </div>
                            <div id="language-dropdown" class="collapse position-absolute">
                                <div class="p-2 rounded bg-white border position-absolute" style="top: calc(100% + 5px);">
                                    @foreach (App\Language::get() as $language)
                                    @if ($language->lang !== session('lang'))
                                    <a href="{{ route('lang', $language->lang) }}" class="px-1 d-flex justify-content-around align-items-center text-black-50 text-decoration-none">
                                        <span class="language-flag border-black-50 shadow-lg mr-1 overflow-hidden d-inline-flex justify-content-center align-items-center position-relative">
                                            <span class="flag-icon position-absolute flag-icon-{{ $language->flag }}"></span>
                                        </span>
                                        <span class="px-1 border-left border-black-50">{{ ucwords($language->lang) }}</span>
                                    </a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="live-chat-text" style="height: 75px;">
                <a href="#" class="text-yellow font-weight-bold position-sticky text-medium" style="top: 17px;">
                    <i class="fas fa-headset mr-2"></i><span class="text-montserrat">LiveChat</span>
                </a>
            </div>
        </div>

        <div class="d-flex justify-content-end align-items-center position-sticky" style="top: -20px;">
            <span class="d-lg-none position-relative text-montserrat pr-2">
                <div class="text-white ml-1 px-1">
                    <a href="#language-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="language-dropdown" class="text-white text-decoration-none d-flex justify-content-around align-items-center">
                        <span class="language-flag shadow-lg mr-1 overflow-hidden d-inline-flex justify-content-center align-items-center position-relative">
                            <span class="flag-icon position-absolute flag-icon-{{ session('flag') }}"></span>
                        </span>
                        <span class="px-1 border-left border-white-50">{{ ucwords(session('lang')) }}</span>
                        <i class="fas fa-caret-down"></i>
                    </a>
                </div>
                <div id="language-dropdown" class="collapse position-absolute">
                    <div class="p-2 rounded bg-white border position-absolute" style="top: calc(100% + 5px);">
                        @foreach (App\Language::get() as $language)
                        @if ($language->lang !== session('lang'))
                        <a href="{{ route('lang', $language->lang) }}" class="px-1 d-flex justify-content-around align-items-center text-black-50 text-decoration-none">
                            <span class="language-flag border-black-50 shadow-lg mr-1 overflow-hidden d-inline-flex justify-content-center align-items-center position-relative">
                                <span class="flag-icon position-absolute flag-icon-{{ $language->flag }}"></span>
                            </span>
                            <span class="px-1 border-left border-black-50">{{ ucwords($language->lang) }}</span>
                        </a>
                        @endif
                        @endforeach
                    </div>
                </div>
            </span>
            <div class="ml-md-4">
                <div class="mb-3 d-none d-lg-block">
                    <div class="d-flex justify-content-center">
                        <a href="#" class="fab fa-lg fa-facebook-square text-white text-decoration-none"></a>
                        <a href="#" class="fab fa-lg fa-twitter-square text-white text-decoration-none ml-2"></a>
                        <a href="#" class="fab fa-lg fa-linkedin text-white text-decoration-none ml-2"></a>
                        <a href="#" class="fab fa-lg fa-skype text-white text-decoration-none ml-2"></a>
                    </div>
                </div>
                <div>
                    @guest
                    {{-- <a href="{{ route('login') }}" class="btn btn-light text-green rounded-sm font-weight-bold text-x-small">
                        <span class="">Sign In</span> <i class="fas fa-sign-in-alt fa-lg ml-2"></i>
                    </a> --}}
                    <div class="position-relative">
                        <a class="btn-animate position-absolute" href="{{ route('login') }}" style="top: -3px; left: 0;">
                            <div class="btn btn-light btn-sm pd-x-0 primary text-green overflow-hidden rounded-sm static position-relative">
                                <span class="d-block text-x-small font-weight-bold px-3 py-1 text-truncate">{{ __('Sign In') }}</span>
                                <div class="bg-black-20 secondary align-items-center d-none active rounded-sm-right px-2 py-2 position-absolute h-100" style="top: 0; right: 0;">
                                    <i class="fas fa-sign-in-alt"></i>
                                </div>
                            </div>
                        </a>
                        <span style="opacity: 0;">o</span>
                    </div>
                    
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
            <i class="fas fa-2x text-white pl-3 fa-bars d-lg-none bg-transparent" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"></i>
        </div>
    </nav>
    <div id="navbar" class="position-absolute collapse d-lg-none w-100 bg-white" style="top: 100%">
        <div>
            <a class="dropdown-item {{ !Request::segment(1) ? 'bg-orange text-white' : '' }}" href="{{ url('/') }}">
                <span>
                    <i class="fas fa-home fa-xs"></i>
                    Home
                </span>
            </a>
            <div id="courses" class="dropdown-item {{ Request::segment(1) === 'courses' ? 'py-0' : '' }}">
                <span class="d-block py-1 px-4 {{ Request::segment(1) === 'courses' ? 'bg-orange text-white' : '' }}" style="margin: 0 -1.5rem;">Courses</span>
                <div class="border-left pl-4">
                    <a class="d-block text-decoration-none text-dark {{ Request::segment(1) === 'courses' && Request::segment(2) === 'bronze' ? 'text-orange' : '' }}" href="{{ route('courses.show', 'bronze') }}">Bronze</a>
                    <a class="d-block text-decoration-none text-dark {{ Request::segment(1) === 'courses' && Request::segment(2) === 'silver' ? 'text-orange' : '' }}" href="{{ route('courses.show', 'silver') }}">Silver</a>
                    <a class="d-block text-decoration-none text-dark {{ Request::segment(1) === 'courses' && Request::segment(2) === 'diamond' ? 'text-orange' : '' }}" href="{{ route('courses.show', 'diamond') }}">Diamond</a>
                </div>
            </div>
            <a class="dropdown-item {{ Request::segment(1) === 'about-us' ? 'bg-orange text-white' : '' }}" href="{{ route('about-us') }}">
                <span>About Us</span>
            </a>
            <a class="dropdown-item {{ Request::segment(1) === 'contact' ? 'bg-orange text-white' : '' }}" href="{{ route('contact') }}">
                <span>Contact</span>
            </a>
            <a class="dropdown-item {{ Request::segment(1) === 'faq' ? 'bg-orange text-white' : '' }}" href="{{ route('faq') }}">
                <span>FAQ</span>
            </a>
        </div>
    </div>
</header>
