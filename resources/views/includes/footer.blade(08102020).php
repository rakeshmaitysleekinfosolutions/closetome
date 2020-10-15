<footer class="footer fi">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- Footer Widget -->
                    <div class="footer-widget footer-about">
                        <div class="footer-logo">
                            <!--<img width="70%" src="img/ui/Picture1.jpg" alt=""/>-->
                            <h2 style=" color: #01cae4;"> {{ trans('sentence.footer.closeToMe') }} </h2>
                        </div>
                        <div class="footer-about-content">
                            <!-- Negocios Locales is the digital place for all the shops -->
                            <p>{{ trans('sentence.footer.closeToMeText') }}</p>
                            <div class="social-icon">
                                <ul>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-youtube-square"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Footer Widget -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">{{ trans('sentence.footer.partner') }}</h2>
                        <ul>
                              <li><a href="{{ route('bus/signup') }}"><i class="fas fa-angle-double-right"></i>{{ trans('sentence.footer.createYourBusiness') }}</a></li>
                              <li><a href="{{ route('bus/signin') }}"><i class="fas fa-angle-double-right"></i>{{ trans('sentence.footer.signInForBusiness') }}</a></li>
                            <li><a href="search.html"><i class="fas fa-angle-double-right"></i>
                                {{ trans('sentence.footer.howToCreateYourBusiness') }} <div style="margin-left: 22px;">{{ trans('sentence.footer.portal') }}</div>
                                </a>
                            </li>
                            
                            <li><a href="patient-dashboard.html"><i class="fas fa-angle-double-right"></i> {{ trans('sentence.footer.pricing') }}</a></li>
                        </ul>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-3 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">{{ trans('sentence.footer.categories') }}</h2>
                        <ul>
                            <li><a href="appointments.html"><i class="fas fa-angle-double-right"></i> {{ trans('sentence.footer.clothes') }}</a></li>
                            <li><a href="chat.html"><i class="fas fa-angle-double-right"></i> {{ trans('sentence.footer.electronics') }}</a></li>
                            <li><a href="login.html"><i class="fas fa-angle-double-right"></i> {{ trans('sentence.footer.gaming') }}</a></li>
                            <li><a href="doctor-register.html"><i class="fas fa-angle-double-right"></i> {{ trans('sentence.footer.computing') }}</a></li>
                            <li><a href="doctor-dashboard.html"><i class="fas fa-angle-double-right"></i>{{ trans('sentence.footer.moreCategories') }}</a></li>
                        </ul>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-3 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-contact">
                        <h2 class="footer-title">{{ trans('sentence.footer.contactUs') }}</h2>
                        <div class="footer-contact-info">
                            <p>
                                <i class="fas fa-phone-alt"></i>
                                +1 34 673 74 74 46
                            </p>
                            <p>
                                <i class="fa fa-paper-plane"></i>
                                <a href="contactus.php" class="text-white">{{ trans('sentence.footer.contactUs') }}</a>
                            </p>
                            <p class="mb-0">
                                <i class="fas fa-envelope"></i>
                                info@cercademi.me
                            </p>
                        </div>
                    </div>
                    <!-- /Footer Widget -->

                </div>

            </div>
        </div>
    </div>
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container-fluid">
            <!-- Copyright -->
            <div class="copyright">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <!-- Copyright Menu -->
                        <div class="copyright-menu">
                            <ul class="policy-menu">
                                <li><a href="term-condition.html">{{ trans('sentence.footer.copyright') }} ©</a></li>
                                <li><a href="term-condition.html">{{ trans('sentence.footer.termsAndConditions') }}</a></li>
                                <li><a href="privacy-policy.html">{{ trans('sentence.footer.policy') }}</a></li>
                            </ul>
                        </div>
                        <!-- /Copyright Menu -->

                    </div>
                </div>
            </div>
            <!-- /Copyright -->

        </div>
    </div>
    <!-- /Footer Bottom -->

</footer>
<!-- /Footer -->

<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
<!-- Bootstrap Core JS -->
<script src="{{ URL::asset('assets/js/popper.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Slick JS -->
<script src="{{ URL::asset('assets/js/slick.js')}}"></script>
<!-- Custom JS -->
<script src="{{ URL::asset('assets/js/script.js')}}"></script>
<!-- Select2 JS -->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Datetimepicker JS -->
<script src="{{ URL::asset('assets/js/moment.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Sticky Sidebar JS -->
<script src="{{ URL::asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>
<!-- Custom JS -->
<script src="{{ URL::asset('assets/js/script.js')}}"></script>
<script src="{{ URL::asset('assets/js/import.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/main.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/myscript.js')}}" type="text/javascript"></script>
