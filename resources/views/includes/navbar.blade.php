<center>
    <div class="bg-white d-none d-sm-block">
        <div class="row justify-content-center">
            <nav class="navbar navbar-expand-lg">
                <img style="width: 17%;" class="navbar-brand d-none d-sm-block d-md-none" src="{{ URL::asset('assets/images/ui/logo.png') }}" alt="" />
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="row justify-content-center">
                        <a class="nav-item nav-link active p-top" href="#">{{ trans('sentence.about_us') }} <span class="sr-only">(current)</span></a>
                        <a class="fa fa-globe icon-font p-top" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="h6"> {{trans('sentence.country')}}</span></a>
                        <div class="dropleft">
                            <div class="dropdown-menu shadow" style="margin-left:100%;" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="lang/en">{{trans('sentence.signup.unitedKingdom')}}</a>
                                {{-- <a class="dropdown-item" href="lang/fr">France</a>
                                <a class="dropdown-item" href="lang/ge">Germany</a>
                                <a class="dropdown-item" href="lang/au">Austria</a> --}}
                                <a class="dropdown-item" href="lang/es">{{trans('sentence.signup.spain')}}</a>
                                {{-- <a class="dropdown-item" href="lang/it">Italy</a> --}}
                            </div>
                        </div>

                        <!-- <a class="nav-item nav-link p-top" href="{{route('shops')}}"><i class="fa fa-map-marker-alt text-info"></i> {{ trans('sentence.shops') }}</a> -->
                        <!-- <a class="nav-item nav-link p-top" href="{{ route('restaurants') }}"><i class="fa fa-map-marker-alt text-danger"></i> {{ trans('sentence.restaurants') }}</a> -->
                    <a class="nav-item nav-link navbar-brand" href="{{ route('/') }}">
                            <img style=" width: 17%;" src="{{ URL::asset('assets/images/ui/logo.png') }}" alt="" />
                        </a>

                            {{-- <a class="nav-item nav-link my-mrf p-top" href="#">u</a>
                            <a class="nav-item nav-link p-top " href="logout.php" tabindex="-1" aria-disabled="true">
                                {{trans('sentence.Logout')}}
                            </a>
                            <a class="nav-item nav-link my-mrf p-top" href="#" tabindex="-1" aria-disabled="true">
                            <img class="img-box" style=" border-radius: 50%; height: 40px; width: 40px; margin-top: -5px;" src="{{ URL::asset('assets/images/user.png') }}" alt="" />
                            </a> --}}
                            <!--<a class="nav-item nav-link p-top " href="#" tabindex="-1" aria-disabled="true">
								<i class="fa fa-cart-plus font-large"></i> &nbsp; <span class="badge badge-info">0</span>
							</a>-->

                            <a class="nav-item nav-link p-top" href="{{route('user_login')}}"><i class="fa fa-sign-in-alt text-info"></i> {{ trans('sentence.Login') }}</a>
                            <a class="nav-item nav-link  p-top" href="{{route('user_signup')}}"><i class="fas fa-user-plus text-blue"></i>&nbsp;{{trans('sentence.Sign_Up')}}</a>
                        <!--<a class="nav-item nav-link p-top" href="register.php"><i class="fa fa-business-time text-green"></i> Start Business</a>-->

                    </div>
                </div>
            </nav>
        </div>
    </div>
</center>

<center>
    <header class="header d-block d-sm-none">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header col-12">
                <a id="mobile_btn" class="" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="index.php" class="navbar-brand logo">
                    <img src="{{ URL::asset('assets/images/ui/logo.png') }}" class="img-fluid" alt="Logo">
                </a>
<!--                 <a href="" class="navbar-brand h4 text-color">
                    Login
                </a>
                <a href="" class="navbar-brand h4 text-color">
                    Register
                </a>
 -->            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="index.php" class="menu-logo">
                        <img src="{{ URL::asset('assets/images/ui/logo.png') }}" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li class="nav-item active">
                        <a href="#">{{ strtoupper(trans('sentence.about_us')) }}</a>
                    </li>
                    <li href="" class="h4">
                        <a href=""><i class="fa fa-map-marker-alt text-info float-left"></i>{{ strtoupper(trans('sentence.shops')) }}</a>
                    </li>
                    <li href="" class=" h4">
                        <a href=""><i class="fa fa-map-marker-alt text-danger float-left"></i> {{ strtoupper(trans('sentence.restaurants')) }}</a>
                    </li>
                    <li href="" class=" h4">
                        <a href="#" target="_blank">{{strtoupper(trans('sentence.login'))}}</a>
                    </li>
                    <li class="login-link">
                        <a href="#">{{strtoupper(trans('sentence.footer.contactUs'))}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white takfua-back btn-border shadow" href="#">{{strtoupper(trans('sentence.signup.registerNow'))}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" type="button" id="mob_country_toggle" onclick="toggleCountry('mob_country_target')">{{ strtoupper(trans('sentence.country')) }}</a>
                        <div id="mob_country_target" style="display: none;">
                        <a class="nav-link" href="lang/es">{{ strtoupper(trans('sentence.signup.spain')) }}</a>
                        <a class="nav-link" href="lang/en">{{ strtoupper(trans('sentence.signup.unitedKingdom')) }}</a>
                        </div>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
</center>
