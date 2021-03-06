<aside class="d-lg-flex flex-column bg-darkblue d-none d-lg-flex" style="width: 250px; flex: 0 0 250px;">
    <div class="bg-black-5 h-100">
        <div class="pt-2 pb-3 px-4 border-bottom border-white-20 border-thin">
            <div class="d-flex align-items-end">
                <div>
                    <a href="{{ url('/') }}" class="d-flex align-items-center" style="top: 10px; height: 50px;">
                        <img src="{{ asset($globalContent['logo']) }}" class="h-100" alt="Logo">
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
            <div class="text-yellow text-300"><i class="fas fa-check-circle"></i> Admin User</div>
        </div>
        <div class="flex-fill text-white text-montserrat border-top border-white-20 pt-4 accordion" id="admin-aside-content">
            @include('includes.auth.admin.aside-content')
        </div>
    </div>
</aside>

<div id="sidebar" class="fixed-top vw-100 vh-100 d-lg-none collapse fade" style="background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7));">
    <aside class="d-lg-flex flex-column bg-darkblue vh-100" style="width: 250px; flex: 0 0 250px;">
        <div class="bg-black-5 h-100">
            <div class="pt-2 pb-3 px-4 border-bottom border-white-20 border-thin">
                <div class="d-flex align-items-end">
                    <div>
                        <a href="{{ url('/') }}" class="d-flex align-items-center" style="top: 10px; height: 50px;">
                            <img src="{{ asset($globalContent['logo']) }}" class="h-100" alt="Logo">
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
                <div class="text-yellow text-300"><i class="fas fa-check-circle"></i> Admin User</div>
            </div>
            <div class="flex-fill text-white text-montserrat border-top border-white-20 pt-4 accordion" id="admin-aside-content">
                @include('includes.auth.admin.aside-content')
            </div>
        </div>
    </aside>
    <div class="vh-100 position-absolute" data-toggle="collapse" data-target="#sidebar" style="right: 0; top: 0; width: calc(100% - 250px);"></div>
</div>