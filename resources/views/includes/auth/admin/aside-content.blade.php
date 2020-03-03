@component('components.auth.aside.admin.link', ['link' => route('admin.dashboard'), 'icon' => 'fas fa-tachometer-alt']) Dashboard @endcomponent
@component('components.auth.aside.admin.dropdown', ['name' => 'admin', 'icon' => 'fas fa-user-cog', 'title' => 'Admins', 'link' => route('admin.admins.index')])
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Admins List', 'link' => route('admin.admins.index')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Add an Admin', 'link' => route('admin.admins.create')]) @endcomponent
@endcomponent
@component('components.auth.aside.admin.dropdown', ['name' => 'author', 'icon' => 'fas fa-user-tag', 'title' => 'Authors', 'link' => route('admin.authors.index')])
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Authors List', 'link' => route('admin.authors.index')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Add an Author', 'link' => route('admin.authors.create')]) @endcomponent
@endcomponent
@component('components.auth.aside.admin.dropdown', ['name' => 'teacher', 'icon' => 'fas fa-chalkboard-teacher', 'title' => 'Teachers', 'link' => route('admin.teachers.index')])
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Teachers List', 'link' => route('admin.teachers.index')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Add a Teacher', 'link' => route('admin.teachers.create')]) @endcomponent
@endcomponent
@component('components.auth.aside.admin.dropdown', ['name' => 'student', 'icon' => 'fas fa-user-graduate', 'title' => 'Students', 'link' => route('admin.students.index')])
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Students List', 'link' => route('admin.students.index')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Add a Student', 'link' => route('admin.students.create')]) @endcomponent
@endcomponent
@component('components.auth.aside.admin.dropdown', ['name' => 'photo', 'icon' => 'fas fa-file-image', 'title' => 'Photos', 'link' => route('admin.photos.index')])
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Photos List', 'link' => route('admin.photos.index')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Add a Photo', 'link' => route('admin.photos.create')]) @endcomponent
@endcomponent
@component('components.auth.aside.admin.dropdown', ['name' => 'document', 'icon' => 'fas fa-file', 'title' => 'Documents', 'link' => route('admin.documents.index')])
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Documents List', 'link' => route('admin.documents.index')]) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Add a Document', 'link' => route('admin.documents.create')]) @endcomponent
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
@component('components.auth.aside.admin.link', ['link' => url('admin/notifications'), 'icon' => 'fas fa-bell']) Notifications @endcomponent
@component('components.auth.aside.admin.dropdown', ['name' => 'settings', 'icon' => 'fas fa-cog', 'title' => 'Settings', 'link' => url('admin/settings')])
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Change password', 'link' => '#']) @endcomponent
    @component('components.auth.aside.admin.dropdown-item', ['name' => 'Edit language', 'link' => '#']) @endcomponent
@endcomponent