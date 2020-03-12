<footer class="bg-darkblue text-white text-montserrat container-fluid p-5 overflow-hidden">
    <div class="row pb-3">
        <div class="col-sm-6 pb-3 pb-sm-0 col-lg-3">
            <div class="pb-0 mb-3 d-inline-block position-relative mb-3">
                <div class="h4 font-weight-bold">{!! $footerContent['address']['title'] !!}</div>
                <div class="position-absolute w-50 d-flex justify-content-center align-items-center" style="bottom: 0; height: 1px;">
                    <div class="bg-white-50 w-100 h-100 d-flex justify-content-center align-items-center">
                        <div class="rounded-circle bg-red" style="width: 12px; height: 12px;"></div>
                    </div>
                </div>
            </div>
            <p>
                {!! $footerContent['address']['content'] !!}
            </p>
        </div>
        <div class="d-none col-sm-6 pb-3 pb-sm-0 col-lg-3">
            <div class="row justify-content-center">
                <div class="col-8">
                    <img src="{!! $globalContent['logo'] !!}" class="img-fluid" alt="Logo">
                </div>
            </div>
        </div>
        <div class="col-sm-6 pb-3 pb-sm-0 col-lg-3">
            <div class="pb-0 mb-3 d-inline-block position-relative mb-3">
                <div class="h4 font-weight-bold">{!! $footerContent['phone_email']['title'] !!}</div>
            <div class="position-absolute w-50 d-flex justify-content-center align-items-center" style="bottom: 0; height: 1px;">
                <div class="bg-white-50 w-100 h-100 d-flex justify-content-center align-items-center">
                    <div class="rounded-circle bg-red" style="width: 12px; height: 12px;"></div>
                </div>
            </div>
            </div>

            <dl class="row">
                <dl class="col-5 d-flex justify-content-between">
                    <div>
                        <i class="fas fa-phone-square text-orange mr-2"></i><strong>{!! $footerContent['phone_email']['online'] !!}</strong>
                    </div>
                    :
                </dl>
                <dl class="col-7 pl-sm-4">
                    <div><a href="tel:{!! $globalContent['phone'] !!}" class="text-white text-decoration-none">{!! $globalContent['phone'] !!}</a></div>
                </dl>

                <dl class="col-5 d-flex justify-content-between">
                    <div>
                        <i class="far fa-envelope text-orange mr-2"></i><strong>{!! $footerContent['phone_email']['email'] !!}</strong>
                    </div>
                    :
                </dl>
                <dl class="col-7 pl-sm-4">
                    <div><a href="mailto:{!! $globalContent['contact'] !!}" class="text-white text-decoration-none">{!! $globalContent['contact'] !!}</a></div>
                    <div><a href="mailto:{!! $globalContent['email'] !!}" class="text-white text-decoration-none">{!! $globalContent['email'] !!}</a></div>
                </dl>

                <dl class="col-5 d-flex justify-content-between">
                    <div>
                        <i class="fas fa-headset text-orange mr-2"></i><strong>{!! $footerContent['phone_email']['support'] !!}</strong>
                    </div>
                    :
                </dl>
                <dl class="col-7 pl-sm-4">
                    <div><a href="mailto:{!! $globalContent['support'] !!}" class="text-white text-decoration-none">{!! $globalContent['support'] !!}</a></div>
                </dl>
            </dl>
        </div>
        <div class="col-sm-6 pb-3 pb-sm-0 col-lg-3">
            <div class="pb-0 mb-3 d-inline-block position-relative mb-3">
                <div class="h4 font-weight-bold">{!! $footerContent['partners']['title'] !!}</div>
                <div class="position-absolute w-50 d-flex justify-content-center align-items-center" style="bottom: 0; height: 1px;">
                    <div class="bg-white-50 w-100 h-100 d-flex justify-content-center align-items-center">
                        <div class="rounded-circle bg-red" style="width: 12px; height: 12px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 pb-3 pb-sm-0 col-lg-3">
            <div class="pb-0 mb-3 d-inline-block position-relative mb-3">
                <div class="h4 font-weight-bold">{!! $footerContent['maps']['title'] !!}</div>
                <div class="position-absolute w-50 d-flex justify-content-center align-items-center" style="bottom: 0; height: 1px;">
                    <div class="bg-white-50 w-100 h-100 d-flex justify-content-center align-items-center">
                        <div class="rounded-circle bg-red" style="width: 12px; height: 12px;"></div>
                    </div>
                </div>
            </div>
            <div class="rounded overflow-hidden">
                <iframe width="100%" height="150" src="https://maps.google.com/maps?width=700&amp;height=150&amp;hl=en&amp;q=La%20maison%20du%20bitcoin+(Auto-%C3%A9cole%20Universit%C3%A9)&amp;ie=UTF8&amp;t=&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>
        <div class="col-sm-6 pb-3 pb-sm-0 col-lg-4">
            <div class="pb-0 mb-3 d-inline-block position-relative mb-3">
                <div class="h4 font-weight-bold">{!! $footerContent['newsletter']['title'] !!}</div>
                <div class="position-absolute w-50 d-flex justify-content-center align-items-center" style="bottom: 0; height: 1px;">
                    <div class="bg-white-50 w-100 h-100 d-flex justify-content-center align-items-center">
                        <div class="rounded-circle bg-red" style="width: 12px; height: 12px;"></div>
                    </div>
                </div>
            </div>
            <form action="" method="post">
                <div class="form-group">
                    <div class="input-group mb-3">
                    <input type="text" class="news-letter-input form-control text-white bg-darkblue" placeholder="{!! $footerContent['newsletter']['form']['email'] !!}..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-orange text-white" type="button" id="button-addon2">{!! $footerContent['newsletter']['form']['subscribe'] !!} <i class="fab fa-telegram-plane fa-1x"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="border-top border-white-50 pt-3 col-12">
        <div class="row justify-content-between">
            <div class="col-sm-6 text-center text-left-sm">
                &copy; Copyright 2020 <a href="#" class="text-yellow text-decoration-none font-weight-bold">Trading Academy</a>. {!! $footerContent['foot']['text'] !!}
            </div>
            <div class="col-sm-6 pt-3 pt-sm-0 text-center text-right-sm">
                <i class="fab fa-2x pl-3 fa-facebook-square"></i>
                <i class="fab fa-2x pl-3 fa-twitter-square"></i>
                <i class="fab fa-2x pl-3 fa-linkedin"></i>
                <i class="fab fa-2x pl-3 fa-skype"></i>
            </div>
        </div>
    </div>
</footer>
