<aside class="d-lg-flex flex-column bg-green d-none d-lg-flex" style="width: 250px; flex: 0 0 250px;">
    <div class="bg-black-50 h-100">
        <div class="pt-2 pb-3 px-4 border-bottom border-white-20 border-thin">
            <div class="d-flex align-items-end">
                <div>
                    <a href="{{ url('/') }}" class="d-flex align-items-center" style="top: 10px; height: 50px;">
                        <img src="{{ asset('/images/Groupe 130@2x.png') }}" class="h-100" alt="Logo">
                    </a>
                </div>
                <div class="text-baloo d-none text-white pl-2 text-medium" style="line-height: 1.2;">
                    GIT <br> Academy
                </div>
            </div>
        </div>
        <div class="py-3 text-center text-white text-montserrat">
            <div class="d-flex justify-content-center position-relative">
                <div class="embed-responsive embed-responsive-1by1 bg-transparent p-1 rounded-circle d-flex justify-content-center align-items-center" style="width: 70px; border: 3px solid orange;">
                    {!! Auth::user()->photo ?
                    '<img src="' . Auth::user()->photo .'" alt="User" class="rounded-circle w-100 h-100">'
                    :
                    '<div class="d-flex justify-content-center align-items-center w-100 h-100 font-weight-bold text-white text-montserrat rounded-circle bg-black-50 text-large">' . Auth::user()->abbreviation() . '</div>'
                    !!}
                </div>
                <div class="position-absolute d-flex justify-content-center align-items-center overflow-hidden rounded-circle" style="top: 0; left: 50%; border: 3px solid orange; width: 23px; height: 23px; transform: translateX(-35px);">
                    <span class="flag-icon position-absolute text-large flag-icon-{{ strtolower(Auth::user()->country) }}"></span>
                </div>
            </div>
            <div class="text-700 pt-2 text-large">{{ Auth::user()->name() }}</div>
            <div class="text-x-small {{ Auth::user()->is_verified ? 'text-lemongreen' : 'text-purered' }}"><i class="far {{ Auth::user()->is_verified ? 'fa-check-circle' : 'fa-times-circle' }} mr-2"></i>Account {{ Auth::user()->is_verified ? 'Verified' : 'not Verified' }}</div>
            <div class="text-yellow text-x-small text-comfortaa pt-1"><i class="far fa-address-card fa-fw mr-1"></i>ID: <span class="text-900" id="ref">{{ Auth::user()->ref }}</span><i class="far fa-copy btn-copy ml-2 text-lightblue bg-transparent fa-lg" type="button" data-clipboard-target="#ref"></i></div>
        </div>
        <div class="flex-fill text-white text-montserrat border-top border-white-20 pt-4">
            @component('components.auth.aside.link', ['link' => route(strtolower(Auth::user()->role->name) . '.dashboard'), 'icon' => 'fas fa-tachometer-alt']) Dashboard @endcomponent
            @if (Auth::user()->role->name === 'Author')
                @component('components.auth.aside.dropdown', ['name' => 'blog', 'icon' => 'fas fa-blog', 'title' => 'Blog', 'link' => route('author.posts.index')])
                    @component('components.auth.aside.dropdown-item', ['name' => 'My Posts', 'link' => route('author.posts.index')]) @endcomponent
                    @component('components.auth.aside.dropdown-item', ['name' => 'Add a Post', 'link' => route('author.posts.create')]) @endcomponent
                @endcomponent
            @endif
            @component('components.auth.aside.link', ['link' => route('user.team'), 'icon' => 'fas fa-users']) Team @endcomponent
            @component('components.auth.aside.link', ['link' => route('user.messages'), 'icon' => 'fas fa-envelope']) Messages @endcomponent
            @component('components.auth.aside.link', ['link' => route('user.notifications'), 'icon' => 'fas fa-bell']) Notifications @endcomponent
            @component('components.auth.aside.dropdown', ['name' => 'settings', 'icon' => 'fas fa-cog', 'title' => 'Settings', 'link' => url('user/settings')])
                @component('components.auth.aside.dropdown-item', ['name' => 'Change password', 'link' => '#']) @endcomponent
                @if (!Auth::user()->is_verified)
                @component('components.auth.aside.dropdown-item', ['name' => 'Verify my account', 'link' => '#']) @endcomponent
                @endif
                @component('components.auth.aside.dropdown-item', ['name' => 'Edit language', 'link' => '#']) @endcomponent
            @endcomponent
        </div>
    </div>
</aside>

<div id="sidebar" class="fixed-top vw-100 vh-100 d-lg-none collapse fade" style="background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7));">
    <aside class="d-lg-flex flex-column bg-green vh-100" style="width: 250px; flex: 0 0 250px;">
        <div class="bg-black-50 h-100">
            <div class="pt-2 pb-3 px-4 border-bottom border-white-20 border-thin">
                <div class="d-flex align-items-end">
                    <div>
                        <a href="{{ url('/') }}" class="d-flex align-items-center" style="top: 10px; height: 50px;">
                            <img src="{{ asset('/images/Groupe 130@2x.png') }}" class="h-100" alt="Logo">
                        </a>
                    </div>
                    <div class="text-baloo d-none text-white pl-2 text-medium" style="line-height: 1.2;">
                        GIT <br> Academy
                    </div>
                </div>
            </div>
            <div class="py-3 text-center text-white text-montserrat">
                <div class="d-flex justify-content-center position-relative">
                    <div class="embed-responsive embed-responsive-1by1 bg-transparent p-1 rounded-circle d-flex justify-content-center align-items-center" style="width: 70px; border: 3px solid orange;">
                        {!! Auth::user()->photo ?
                        '<img src="' . Auth::user()->photo .'" alt="User" class="rounded-circle w-100 h-100">'
                        :
                        '<div class="d-flex justify-content-center align-items-center w-100 h-100 font-weight-bold text-white text-montserrat rounded-circle bg-black-50 text-large">' . Auth::user()->abbreviation() . '</div>'
                        !!}
                    </div>
                    <div class="position-absolute d-flex justify-content-center align-items-center overflow-hidden rounded-circle" style="top: 0; left: 50%; border: 3px solid orange; width: 23px; height: 23px; transform: translateX(-35px);">
                        <span class="flag-icon position-absolute text-large flag-icon-{{ strtolower(Auth::user()->country) }}"></span>
                    </div>
                </div>
                <div class="text-700 pt-2 text-large">{{ Auth::user()->name() }}</div>
                <div class="text-x-small {{ Auth::user()->is_verified ? 'text-lemongreen' : 'text-purered' }}"><i class="far {{ Auth::user()->is_verified ? 'fa-check-circle' : 'fa-times-circle' }} mr-2"></i>Account {{ Auth::user()->is_verified ? 'Verified' : 'not Verified' }}</div>
                <div class="text-yellow text-x-small text-comfortaa pt-1"><i class="far fa-address-card fa-fw mr-1"></i>ID: <span class="text-900" id="ref">{{ Auth::user()->ref }}</span><i class="far fa-copy btn-copy ml-2 text-lightblue bg-transparent fa-lg" type="button" data-clipboard-target="#ref"></i></div>
            </div>
            <div class="text-white text-montserrat border-top border-white-20 pt-4" style="height: calc(100vh - 248.25px); overflowY: auto;">
                @component('components.auth.aside.link', ['link' => route(strtolower(Auth::user()->role->name) . '.dashboard'), 'icon' => 'fas fa-tachometer-alt']) Dashboard @endcomponent
                @if (Auth::user()->role->name === 'Author')
                    @component('components.auth.aside.dropdown', ['name' => 'blog', 'icon' => 'fas fa-blog', 'title' => 'Blog', 'link' => route('author.posts.index')])
                        @component('components.auth.aside.dropdown-item', ['name' => 'My Posts', 'link' => route('author.posts.index')]) @endcomponent
                        @component('components.auth.aside.dropdown-item', ['name' => 'Add a Post', 'link' => route('author.posts.create')]) @endcomponent
                    @endcomponent
                @endif
                @component('components.auth.aside.link', ['link' => route('user.team'), 'icon' => 'fas fa-users']) Team @endcomponent
                @component('components.auth.aside.link', ['link' => route('user.messages'), 'icon' => 'fas fa-envelope']) Messages @endcomponent
                @component('components.auth.aside.link', ['link' => route('user.notifications'), 'icon' => 'fas fa-bell']) Notifications @endcomponent
                @component('components.auth.aside.dropdown', ['name' => 'settings', 'icon' => 'fas fa-cog', 'title' => 'Settings', 'link' => url('user/settings')])
                    @component('components.auth.aside.dropdown-item', ['name' => 'Change password', 'link' => '#']) @endcomponent
                    @if (!Auth::user()->is_verified)
                    @component('components.auth.aside.dropdown-item', ['name' => 'Verify my account', 'link' => '#']) @endcomponent
                    @endif
                    @component('components.auth.aside.dropdown-item', ['name' => 'Edit language', 'link' => '#']) @endcomponent
                @endcomponent
            </div>
        </div>
    </aside>
    <div class="vh-100 position-absolute" data-toggle="collapse" data-target="#sidebar" style="right: 0; top: 0; width: calc(100% - 250px);"></div>
</div>
