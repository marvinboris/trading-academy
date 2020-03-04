@component('components.auth.aside.link', ['link' => route(strtolower(Auth::user()->role->name) . '.dashboard'), 'icon' => 'fas fa-tachometer-alt']) Dashboard @endcomponent
@if (Auth::user()->role->name === 'Author')
    @component('components.auth.aside.dropdown', ['name' => 'blog', 'icon' => 'fas fa-blog', 'title' => 'Blog', 'link' => route('author.posts.index')])
        @component('components.auth.aside.dropdown-item', ['name' => 'My Posts', 'link' => route('author.posts.index')]) @endcomponent
        @component('components.auth.aside.dropdown-item', ['name' => 'Add a Post', 'link' => route('author.posts.create')]) @endcomponent
    @endcomponent
@endif
@if (Auth::user()->role->name === 'Teacher')
    @component('components.auth.aside.dropdown', ['name' => 'courses', 'icon' => 'fas fa-book-open', 'title' => 'Courses', 'link' => route('teacher.courses.index')])
        @component('components.auth.aside.dropdown-item', ['name' => 'My Courses', 'link' => route('teacher.courses.index')]) @endcomponent
        @component('components.auth.aside.dropdown-item', ['name' => 'Add a Course', 'link' => route('teacher.courses.create')]) @endcomponent
    @endcomponent
    @component('components.auth.aside.dropdown', ['name' => 'sessions', 'icon' => 'fas fa-clock', 'title' => 'Sessions', 'link' => route('teacher.sessions.index')])
        @component('components.auth.aside.dropdown-item', ['name' => 'My Sessions', 'link' => route('teacher.sessions.index')]) @endcomponent
        @component('components.auth.aside.dropdown-item', ['name' => 'Add a Session', 'link' => route('teacher.sessions.create')]) @endcomponent
    @endcomponent
    @component('components.auth.aside.dropdown', ['name' => 'documents', 'icon' => 'fas fa-file', 'title' => 'Documents', 'link' => route('teacher.documents.index')])
        @component('components.auth.aside.dropdown-item', ['name' => 'My Documents', 'link' => route('teacher.documents.index')]) @endcomponent
        @component('components.auth.aside.dropdown-item', ['name' => 'Add a Document', 'link' => route('teacher.documents.create')]) @endcomponent
    @endcomponent
    @component('components.auth.aside.dropdown', ['name' => 'sms', 'icon' => 'fas fa-at', 'title' => 'SMS', 'link' => route('teacher.messages.index')])
        @component('components.auth.aside.dropdown-item', ['name' => 'SMS List', 'link' => route('teacher.messages.index')]) @endcomponent
        @component('components.auth.aside.dropdown-item', ['name' => 'Send SMS', 'link' => route('teacher.messages.create')]) @endcomponent
    @endcomponent
@endif
@if (Auth::user()->role->name === 'Student')
    @component('components.auth.aside.dropdown', ['name' => 'courses', 'icon' => 'fas fa-book', 'title' => 'Courses', 'link' => route('student.courses.index')])
        @component('components.auth.aside.dropdown-item', ['name' => 'My Courses', 'link' => route('student.courses.mine')]) @endcomponent
        @component('components.auth.aside.dropdown-item', ['name' => 'Courses List', 'link' => route('student.courses.index')]) @endcomponent
    @endcomponent
@endif
@component('components.auth.aside.dropdown', ['name' => 'finance', 'icon' => 'fas fa-exchange-alt', 'title' => 'Finance', 'link' => url('user/finance')])
    @component('components.auth.aside.dropdown-item', ['name' => 'Transfer', 'link' => route('user.finance.transfers.create')]) @endcomponent
    @component('components.auth.aside.dropdown-item', ['name' => 'Transfer List', 'link' => route('user.finance.transfers.index')]) @endcomponent
    @component('components.auth.aside.dropdown-item', ['name' => 'Add Deposit', 'link' => route('user.finance.deposits.create')]) @endcomponent
    @component('components.auth.aside.dropdown-item', ['name' => 'Deposit List', 'link' => route('user.finance.deposits.index')]) @endcomponent
    @component('components.auth.aside.dropdown-item', ['name' => 'Withdraw', 'link' => route('user.finance.withdraws.create')]) @endcomponent
    @component('components.auth.aside.dropdown-item', ['name' => 'Withdraw List', 'link' => route('user.finance.withdraws.index')]) @endcomponent
@endcomponent
@component('components.auth.aside.link', ['link' => route('user.team'), 'icon' => 'fas fa-users']) Team @endcomponent
@component('components.auth.aside.link', ['link' => route('user.messages'), 'icon' => 'fas fa-envelope']) Messages @endcomponent
@component('components.auth.aside.link', ['link' => route('user.notifications'), 'icon' => 'fas fa-bell']) Notifications @endcomponent
@component('components.auth.aside.dropdown', ['name' => 'settings', 'icon' => 'fas fa-cog', 'title' => 'Settings', 'link' => url('user/settings')])
    @component('components.auth.aside.dropdown-item', ['name' => 'Change password', 'link' => route('user.settings.change-password.get')]) @endcomponent
    @if (!Auth::user()->is_verified)
    @component('components.auth.aside.dropdown-item', ['name' => 'Verify my account', 'link' => route('user.settings.verification.get')]) @endcomponent
    @endif
    @component('components.auth.aside.dropdown-item', ['name' => 'Edit language', 'link' => route('user.settings.edit-language.get')]) @endcomponent
@endcomponent