<aside class="d-flex flex-column bg-darkblue" style="width: 300px;">
    <div class="py-3 d-flex justify-content-center">
        <a href="{{ url('/') }}" class="d-block position-sticky" style="top: 10px; height: 60px;">
            <img src="/images/Groupe 130@2x.png" class="h-100" alt="Logo">
        </a>
    </div>
    <div class="flex-fill text-white">
        @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-tachometer-alt']) Dashboard @endcomponent
        @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-chalkboard-teacher']) Teachers @endcomponent
        @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-user-graduate']) Students @endcomponent
        @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-book']) Courses @endcomponent
        @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-graduation-cap']) Sessions @endcomponent
        @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-blog']) Blog @endcomponent
        @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-envelope']) Messages @endcomponent
        @component('components.auth.aside.link', ['link' => '#', 'icon' => 'fas fa-cog']) Settings @endcomponent
    </div>
</aside>
