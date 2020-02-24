<section class="d-none d-xl-flex position-absolute align-items-center justify-content-center" style="top: -25px; right: 27.5%; transform: translateY(-100%); width: 45%; min-width: 20rem;">
    <div class="mr-2 text-small">
        Affiliate link :
    </div>
    <div class="flex-fill">
        <div class="input-group">
           <input type="text" id="referral-link" class="form-control text-small" value="{{ route('register') . '/?ref=' . Auth::user()->ref }}" readonly>
           <div class="input-group-append">
                <button class="btn btn-green border-green btn-copy py-1" data-clipboard-target="#referral-link"><i class="far fa-copy mr-2"></i>Copy</button>
            </div>
        </div>
    </div>
</section>
<section class="d-sm-flex pb-3 d-xl-none text-center align-items-center justify-content-center" style="margin: auto; width: 60%; min-width: 23rem; max-width: 100%;">
    <div class="mr-2 text-small">
        Affiliate link :
    </div>
    <div class="flex-fill">
        <div class="input-group">
           <input type="text" id="referral-link" class="form-control text-small" value="{{ route('register') . '/?ref=' . Auth::user()->ref }}" readonly>
           <div class="input-group-append">
                <button class="btn btn-green border-green btn-copy py-1" data-clipboard-target="#referral-link"><i class="far fa-copy mr-2"></i>Copy</button>
            </div>
        </div>
    </div>
</section>
