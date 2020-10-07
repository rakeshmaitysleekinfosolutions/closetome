
    <style>
        .contac{
            margin-left: 4%;
            margin-right: 4%;
        }
        .my-mrf{
            margin-left: 1vw;
            margin-right: 1vw;
        }
    </style>
    <center>

    <div class="bg-white d-none d-sm-block">
        <div class="row justify-content-center">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img style="width: 17%;" class="navbar-brand d-none d-sm-block d-md-none" src="{{URL::asset('assets/images/ui/logo.png')}}" alt=""/>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="row justify-content-center" >
                        <a class="nav-item nav-link active p-top" href="#">About us <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link my-mrf p-top" href="#"><i class="fa fa-map-marker-alt text-info"></i> Shops</a>
                        <a class="nav-item nav-link my-mrf p-top" href="#"><i class="fa fa-map-marker-alt text-danger"></i> Restaurants</a>
                        <a class="nav-item nav-link navbar-brand" href="#">
                            <img style=" width: 17%;" src="{{URL::asset('assets/images/ui/logo.png')}}" alt=""/>
                        </a>
                        <a class="nav-item nav-link my-mrf p-top" href="#">
                                {{ $user->profile_name }}
                        </a>
                        <a class="nav-item nav-link p-top " href="#" tabindex="-1" aria-disabled="true">
                            <i class="fa fa-cart-plus font-large"></i> &nbsp; <span class="badge badge-info">1</span>
                        </a>
                        <a class="nav-item nav-link my-mrf p-top" href="{{ route('user/logout') }}">
                            Logout
                        </a>
                        <a class="fa fa-globe icon-font p-top my-mrf" style=" margin-top: 4px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="h6"> Country</span></a>
                        <div class=dropleft">
                            <div class="dropdown-menu shadow my-n4" style="margin-left:100%;" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">English</a>
                                <a class="dropdown-item" href="#">Spanish</a>
                                <a class="dropdown-item" href="#">Italian</a>
                                <a class="dropdown-item" href="#">French</a>
                                <a class="dropdown-item" href="#">German</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
     </div>
    </center>
    
    <center>
    <header class="header d-block d-sm-none">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" class="" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="index.php" class="navbar-brand logo">
                    <img src="{{URL::asset('assets/images/ui/logo.png')}}" class="img-fluid" alt="Logo">
                </a>
                <a href="" class="navbar-brand h4 text-color">
                    Login
                </a>
                <a href="" class="navbar-brand h4 text-color">
                    Register
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="index.php" class="menu-logo">
                        <img src="{{URL::asset('assets/images/ui/logo.png')}}" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li class="nav-item active">
                        <div class="input-group">
                            <input type="text" style="height: 48px; width:100%;" placeholder="  Search Professionals & jobs" class="border border-default my-2" aria-label="Text input with dropdown button">
                        </div>
                    </li>
                    <li class="">
                        <a href="#">ABOUT US</a>
                    </li>
                    <li href="" class="h4">
                        <a href=""><i class="fa fa-map-marker-alt text-info float-left"></i> Shops</a>
                    </li>
                    <li href="" class=" h4">
                        <a href=""><i class="fa fa-map-marker-alt text-danger float-left"></i> Restaurants</a>
                    </li>
                    <li href="" class=" h4">
                        <a href="#" target="_blank">LOG IN</a>
                    </li>
                    <li class="login-link">
                        <a href="#">CONTACT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white takfua-back btn-border shadow" href="#">REGISTER</a>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    </center>