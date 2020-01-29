</div>
<footer class="bg-darkblue font-family-montserrat container-fluid p-5">
    <div class="row pb-3">
        <div class="col-sm-6 col-md-3 text-center">
            <div class="row justify-content-center">
                <div class="col-8">
                    <img src="/images/Groupe 130@2x.png" class="img-fluid" alt="Logo">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 text-center">
            <div class="h3 font-family-baloo text-center text-yellow">Contact Info</div>
            <p class="text-white">
                Address 1135,<br>
                Rue Mandessi Bell Bali,<br>
                Office : +237 655 888 468 <br>
                Email : contact@liyeplimal.net <br>
                Web Site : www.liyeplimal.net
            </p>
        </div>
        <div class="col-sm-6 col-md-3 text-center">
            <div class="h3 font-family-baloo text-center text-yellow">Newsletter</div>
            <form action="" method="post">
                <div class="form-group">
                    <div class="input-group">
                        <input type="email" class="form-control text-white bg-darkblue" placeholder="Enter your email" required>
                        <div class="input-group-append">
                            <button class="btn btn-yellow fas fa-paper-plane fa-lg"></button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="h3 font-family-baloo text-center text-yellow">Our partners</div>

        </div>
        <div class="col-sm-6 col-md-3 text-center">
            <div class="h3 font-family-baloo text-center text-yellow">Location</div>
            <div>
                <iframe width="100%" height="150" src="https://maps.google.com/maps?width=700&amp;height=150&amp;hl=en&amp;q=La%20maison%20du%20bitcoin+(Auto-%C3%A9cole%20Universit%C3%A9)&amp;ie=UTF8&amp;t=&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>
    </div>
    <div class="border-top border-white text-white pt-3">
        <div class="d-flex justify-content-between">
            <div>
                &copy; Copyright 2020 <a href="#" class="text-yellow">Trading Academy</a>. All rights reserved. A <strong>Global Investment Trading</strong> product.
            </div>
            <div class="d-flex">
                <i class="fab fa-2x pl-3 fa-facebook-square"></i>
                <i class="fab fa-2x pl-3 fa-twitter-square"></i>
                <i class="fab fa-2x pl-3 fa-linkedin"></i>
                <i class="fab fa-2x pl-3 fa-skype"></i>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
