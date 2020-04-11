<aside class="d-lg-flex flex-column bg-green d-none d-lg-flex" style="width: 250px; flex: 0 0 250px;">
    <div class="bg-black-50 h-100">
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
                <form id="photo-form" action="{{ route('user.settings.profile.post') }}" class="d-flex justify-content-end position-absolute w-100 pr-4" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="photo" class="d-none" id="photo-form-photo">
                    <div class="text-right">
                        <label for="photo-form-photo" class="fas fa-lg fa-edit text-yellow bg-transparent border-0"></label>
                        <br>
                        <button class="btn btn-link p-0 text-yellow d-none text-small">Save</button>
                    </div>
                </form>
                <div class="embed-responsive embed-responsive-1by1 bg-transparent p-1 rounded-circle d-flex justify-content-center align-items-center" style="width: 70px; border: 3px solid orange;">
                    {!! Auth::user()->photo ?
                    '<div style="background: url(' . asset(Auth::user()->photo->path) . ') no-repeat center; background-size: cover;" class="rounded-circle embed-responsive embed-responsive-1by1 w-100"></div>'
                    :
                    '<div class="d-flex justify-content-center align-items-center w-100 h-100 font-weight-bold text-white text-montserrat rounded-circle bg-black-50 text-large">' . Auth::user()->abbreviation() . '</div>'
                    !!}
                </div>
                <div class="position-absolute d-flex justify-content-center align-items-center overflow-hidden rounded-circle" style="top: 0; left: 50%; border: 3px solid orange; width: 23px; height: 23px; transform: translateX(-35px);">
                    <span class="flag-icon position-absolute text-large flag-icon-{{ strtolower(Auth::user()->country) }}"></span>
                </div>
            </div>
            <div class="text-700 pt-2 text-large text-montserrat-alt">{{ Auth::user()->name() }}</div>
            {{-- <div class="text-x-small {{ Auth::user()->is_verified ? 'text-lemongreen' : 'text-purered' }}"><i class="far {{ Auth::user()->is_verified ? 'fa-check-circle' : 'fa-times-circle' }} mr-2"></i>Account {{ Auth::user()->is_verified ? 'Verified' : 'not Verified' }}</div> --}}
            @if (Auth::user()->is_verified)
                <div class="text-x-small text-lemongreen"><i class="far fa-check-circle mr-2"></i>Account Verified</div>
            @else
                @if (Auth::user()->verification())
                    @if (Auth::user()->verification()->status === 0)
                    <div class="text-x-small text-primary"><i class="fas fa-spinner fa-spin"></i><span class="ml-2">Pending Verification</span></div>
                    @else
                    <div class="text-x-small text-purered"><i class="far fa-times-circle mr-2"></i>Verification Cancelled</div>
                    @endif
                @else
                    <div class="text-x-small text-purered"><i class="far fa-times-circle mr-2"></i>Account Not Verified</div>
                @endif
            @endif
            <div class="text-yellow text-x-small text-comfortaa pt-1"><i class="far fa-address-card fa-fw mr-1"></i>ID: <span class="text-900" id="ref">{{ Auth::user()->ref }}</span><i class="far fa-copy btn-copy ml-2 text-lightblue bg-transparent fa-lg" type="button" data-clipboard-target="#ref"></i></div>
        </div>
        <div class="flex-fill text-white text-montserrat border-top border-white-20 pt-4 accordion" id="user-aside-content">
            @include('includes.auth.user.aside-content')
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
                    <form id="photo-form-aside" action="{{ route('user.settings.profile.post') }}" class="d-flex justify-content-end position-absolute w-100 pr-4" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="file" name="photo" class="d-none" id="photo-form-aside-photo">
                        <div class="text-right">
                            <label for="photo-form-aside-photo" class="fas fa-lg fa-edit text-yellow bg-transparent border-0"></label>
                            <br>
                            <button class="btn btn-link p-0 text-yellow d-none text-small">Save</button>
                        </div>
                    </form>
                    <div class="embed-responsive embed-responsive-1by1 bg-transparent p-1 rounded-circle d-flex justify-content-center align-items-center" style="width: 70px; border: 3px solid orange;">
                        {!! Auth::user()->photo ?
                        '<div style="background: url(' . asset(Auth::user()->photo->path) . ') no-repeat center; background-size: cover;" class="rounded-circle embed-responsive embed-responsive-1by1 w-100"></div>'
                        :
                        '<div class="d-flex justify-content-center align-items-center w-100 h-100 font-weight-bold text-white text-montserrat rounded-circle bg-black-50 text-large">' . Auth::user()->abbreviation() . '</div>'
                        !!}
                    </div>
                    <div class="position-absolute d-flex justify-content-center align-items-center overflow-hidden rounded-circle" style="top: 0; left: 50%; border: 3px solid orange; width: 23px; height: 23px; transform: translateX(-35px);">
                        <span class="flag-icon position-absolute text-large flag-icon-{{ strtolower(Auth::user()->country) }}"></span>
                    </div>
                </div>
                <div class="text-700 pt-2 text-large text-montserrat-alt">{{ Auth::user()->name() }}</div>
                <div class="text-x-small {{ Auth::user()->is_verified ? 'text-lemongreen' : 'text-purered' }}"><i class="far {{ Auth::user()->is_verified ? 'fa-check-circle' : 'fa-times-circle' }} mr-2"></i>Account {{ Auth::user()->is_verified ? 'Verified' : 'not Verified' }}</div>
                <div class="text-yellow text-x-small text-comfortaa pt-1"><i class="far fa-address-card fa-fw mr-1"></i>ID: <span class="text-900" id="ref">{{ Auth::user()->ref }}</span><i class="far fa-copy btn-copy ml-2 text-lightblue bg-transparent fa-lg" type="button" data-clipboard-target="#ref"></i></div>
            </div>
            <div class="text-white text-montserrat border-top border-white-20 pt-4 accordion" id="user-aside-content" style="height: calc(100vh - 248.25px); overflowY: auto;">
                @include('includes.auth.user.aside-content')
            </div>
        </div>
    </aside>
    <div class="vh-100 position-absolute" data-toggle="collapse" data-target="#sidebar" style="right: 0; top: 0; width: calc(100% - 250px);"></div>
</div>
