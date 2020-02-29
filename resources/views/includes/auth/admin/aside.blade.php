<aside class="d-lg-flex flex-column bg-darkblue d-none d-lg-flex" style="width: 250px; flex: 0 0 250px;">
    <div class="bg-black-5 h-100">
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
                <div class="embed-responsive embed-responsive-1by1 bg-transparent p-1 rounded-circle d-flex justify-content-center align-items-center" style="width: 70px; border: 2px solid orange;">
                    {!! Auth::guard('admin')->user()->photo ?
                    '<img src="' . Auth::guard('admin')->user()->photo .'" alt="User" class="rounded-circle w-100 h-100">'
                    :
                    '<div class="d-flex justify-content-center align-items-center w-100 h-100 font-weight-bold text-white text-montserrat rounded-circle bg-black-50 text-large">' . Auth::guard('admin')->user()->abbreviation() . '</div>'
                    !!}
                </div>
            </div>
            <div class="text-700 pt-2 text-large text-montserrat-alt">{{ Auth::guard('admin')->user()->name }}</div>
        </div>
        <div class="flex-fill text-white text-montserrat border-top border-white-20 pt-4">
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
            @component('components.auth.aside.admin.link', ['link' => url('admin/notifications'), 'icon' => 'fas fa-bell']) Notifications @endcomponent
            @component('components.auth.aside.admin.dropdown', ['name' => 'settings', 'icon' => 'fas fa-cog', 'title' => 'Settings', 'link' => url('admin/settings')])
                @component('components.auth.aside.admin.dropdown-item', ['name' => 'Change password', 'link' => '#']) @endcomponent
                @component('components.auth.aside.admin.dropdown-item', ['name' => 'Edit language', 'link' => '#']) @endcomponent
            @endcomponent
        </div>
    </div>
</aside>