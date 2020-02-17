<div class="d-flex py-2 px-3 align-items-center justify-content-between bg-darkblue text-white">
    <div>
        <input type="search" name="search" id="search" placeholder="Search..." class="form-control border-0 rounded-pill">
    </div>
    <div>
        <div class="d-flex justify-content-end align-items-center">
            <span class="px-3 position-relative border-left border-right">
                <i class="fas fa-lg fa-bell"></i>
                <span class="position-absolute badge text-xx-small m-0 bg-orange rounded-circle" style="right: 10px; top: -5px;">0</span>
            </span>
            <span class="px-3 position-relative border-right">
                <i class="fas fa-lg fa-envelope"></i>
                <span class="position-absolute badge text-xx-small m-0 bg-orange rounded-circle" style="right: 10px; top: -5px;">0</span>
            </span>
            <div class="px-3">
                <a href="#" class="pl-2 dropdown-toggle d-flex align-items-center dropdown-toggle-split text-decoration-none text-reset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="pr-1">
                        <div class="rounded-circle d-flex justify-content-center align-items-center bg-orange overflow-hidden" style="width: 50px; height: 50px;">
                            <div class="rounded-circle d-flex justify-content-center align-items-center bg-darkblue overflow-hidden" style="width: 45px; height: 45px;">
                                <img src="https://placehold.it/100x100" alt="User" class="rounded-circle img-fluid" style="width: 40px; height: 40px;">
                            </div>
                        </div>
                    </div>
                    <span class="pr-1">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>
        </div>
    </div>
</div>
