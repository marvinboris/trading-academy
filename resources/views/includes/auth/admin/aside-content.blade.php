@component('components.auth.aside.admin.link', ['link' => route('admin.dashboard'), 'icon' => 'fas fa-tachometer-alt']) Dashboard @endcomponent

@component('components.auth.aside.admin.dropdown', ['name' => 'users', 'icon' => 'fas fa-users', 'title' => 'Users', 'link' => url('admin/users')])
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Admins', 'link' => route('admin.users.admins.index')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Authors', 'link' => route('admin.users.authors.index')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Teachers', 'link' => route('admin.users.teachers.index')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Students', 'link' => route('admin.users.students.index')]) @endcomponent
@endcomponent

@component('components.auth.aside.admin.dropdown', ['name' => 'about-user', 'icon' => 'fas fa-user-cog', 'title' => 'About User', 'link' => url('admin/about-user')])
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Verify User', 'link' => route('admin.about-user.verifications.get')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Commissions', 'link' => route('admin.about-user.commissions')]) @endcomponent
@endcomponent

@component('components.auth.aside.admin.dropdown', ['name' => 'media', 'icon' => 'fas fa-file', 'title' => 'Media', 'link' => url('admin/media')])
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Photos', 'link' => route('admin.media.photos.index')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Documents', 'link' => route('admin.media.documents.index')]) @endcomponent
@endcomponent

@component('components.auth.aside.admin.dropdown', ['name' => 'course', 'icon' => 'fas fa-school', 'title' => 'Courses', 'link' => route('admin.courses.index')])
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Courses List', 'link' => route('admin.courses.index')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Add a Course', 'link' => route('admin.courses.create')]) @endcomponent
@endcomponent
@component('components.auth.aside.admin.dropdown', ['name' => 'session', 'icon' => 'fas fa-clock', 'title' => 'Sessions', 'link' => route('admin.sessions.index')])
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Sessions List', 'link' => route('admin.sessions.index')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Add a Session', 'link' => route('admin.sessions.create')]) @endcomponent
@endcomponent
@component('components.auth.aside.admin.dropdown', ['name' => 'deposit', 'icon' => 'fas fa-dollar-sign', 'title' => 'Deposits', 'link' => route('admin.deposits.index')])
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Deposits List', 'link' => route('admin.deposits.index')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Add a Deposit', 'link' => route('admin.deposits.create')]) @endcomponent
@endcomponent
@component('components.auth.aside.admin.dropdown', ['name' => 'cms', 'icon' => 'fas fa-file-signature', 'title' => 'CMS', 'link' => url('admin/cms')])
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Global', 'link' => route('admin.cms.global')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Components', 'link' => route('admin.cms.components')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Front-end', 'link' => route('admin.cms.front-end')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Back-end', 'link' => route('admin.cms.back-end.index')]) @endcomponent
@endcomponent
@component('components.auth.aside.admin.link', ['link' => url('admin/notifications'), 'icon' => 'fas fa-bell']) Notifications @endcomponent
@component('components.auth.aside.admin.dropdown', ['name' => 'settings', 'icon' => 'fas fa-cog', 'title' => 'Settings', 'link' => url('admin/settings')])
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Change password', 'link' => '#']) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Edit language', 'link' => '#']) @endcomponent
@endcomponent