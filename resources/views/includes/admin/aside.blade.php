<aside class="d-flex flex-column bg-green" style="width: 250px;">
    <div class="bg-black-50 h-100">
        <div class="pt-2 pb-3 px-4 border-bottom border-white-20 border-thin bg-blac">
            <a href="{{ url('/') }}" class="d-flex align-items-center" style="top: 10px; height: 50px;">
                <img src="{{ asset('/images/Groupe 130@2x.png') }}" class="h-100" alt="Logo">
            </a>
        </div>
        <div class="flex-fill text-white text-montserrat pt-3">
            @component('components.auth.aside.link', ['link' => route(strtolower(Auth::user()->role->name) . '.dashboard'), 'icon' => 'fas fa-tachometer-alt']) Dashboard @endcomponent
            @if (Auth::user()->role->name === 'Author')
                @component('components.auth.aside.dropdown', ['name' => 'blog', 'icon' => 'fas fa-blog', 'title' => 'Blog', 'links' => [route('author.posts.index'), route('author.posts.create')]])
                    @component('components.auth.aside.dropdown-item', ['name' => 'My Posts', 'link' => route('author.posts.index')]) @endcomponent
                    @component('components.auth.aside.dropdown-item', ['name' => 'Add a Post', 'link' => route('author.posts.create')]) @endcomponent
                @endcomponent
            @endif
            @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-users']) Team @endcomponent
            @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-envelope']) Messages @endcomponent
            @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-bell']) Notifications @endcomponent
            @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-cog']) Settings @endcomponent
        </div>
    </div>
</aside>
