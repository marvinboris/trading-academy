<aside class="d-flex flex-column bg-green" style="width: 250px;">
    <div class="py-3 d-flex justify-content-center bg-black-33">
        <a href="{{ url('/') }}" class="d-block position-sticky" style="top: 10px; height: 60px;">
            <img src="/images/Groupe 130@2x.png" class="h-100" alt="Logo">
        </a>
    </div>
    <div class="flex-fill text-white">
        @component('components.auth.aside.link', ['link' => route(strtolower(Auth::user()->role->name) . '.dashboard'), 'icon' => 'fas fa-tachometer-alt']) Dashboard @endcomponent
        @component('components.auth.aside.dropdown', ['name' => 'blog', 'icon' => 'fas fa-blog', 'title' => 'Blog'])
            @component('components.auth.aside.dropdown-item', ['name' => 'My Posts', 'link' => route('author.posts.index')]) @endcomponent
            @component('components.auth.aside.dropdown-item', ['name' => 'Add a Post', 'link' => route('author.posts.create')]) @endcomponent
        @endcomponent
        @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-users']) Team @endcomponent
        @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-envelope']) Messages @endcomponent
        @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-bell']) Notifications @endcomponent
        @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-cog']) Settings @endcomponent
    </div>
</aside>
