<center>
        <div class="bg-white">
            <div class="contacv">
                <nav class="navbar navbar-expand-lg navbar-light bg-white">
                    <a href="ownerpanel.php"><img style=" width: 70px;" src="{{URL::asset('assets/images/ui/logo.png')}}" alt=""/></a>
                    <button class="navbar-toggler bg-success-light btn-border" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-list"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">

                        </ul>
                        <form class="my-lg-0" style=" padding-top: 12px;">
                            <ul class="form-inline list-unstyled">
                                <li class="nav-item">
                                    <a class="nav-link" href="">Business Name</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('bus/signout') }}">{{ trans('sentence.Logout') }}</a>
                                </li>
                                <!--					<li class="nav-item">
                                                        <a class="nav-link " href="login.php">REPORTS</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " href="login.php">MESSAGES</a>
                                                    </li>-->
                                <!--                    <li class="nav-item">
                                                        <a class="nav-link icon-font" href="login.php"><i class="far fa-question-circle "></i></a>
                                                    </li>-->
                                <li class="nav-item">
                                    <div class="nav-link">
                                        <a class="fas fa-globe icon-font" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                        <div class="dropleft">
                                            <div class="dropdown-menu shadow my-n4" style="margin-left:860px;" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ route('lang2',['locale'=>'en']) }}">United Kingdom</a>
                                                <a class="dropdown-item" href="{{ route('lang2',['locale'=>'es']) }}">Spain</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link icon-font" href="login.php"><i class="far fa-paper-plane"></i></a>
                                </li>
                                <li class="nav-item">
                                    <img class="img-profile-nav border" src="{{ URL::asset('assets/images/users/user.png') }}">
                                </li>
                            </ul>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </center>


