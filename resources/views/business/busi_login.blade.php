<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- Favicons -->
        <!--<link type="image/x-icon" href="assets/img/logo-tab.png" rel="icon">-->
        <!-- Bootstrap CSS -->
        <title>{{ trans('sentence.footer.closeToMe') }}</title>
        <link rel="icon" href="{{ URL::asset('assets/images/ui/logo.png') }}">

        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/plugins/fontawesome/css/all.min.css') }}">
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/customstyle.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}"/>
        <!-- Datetimepicker CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
        <link href="{{ URL::asset('assets/css/import.css') }}" rel="stylesheet" type="text/css"/>
        @isset($data)
            <link href="{{ URL::asset($data) }}" rel="stylesheet" type="text/css"/>            
        @endisset    
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <!-- Main CSS -->
<!--        <link rel="stylesheet" href="assets/css/style.css">
        
        <link href="assets/db/css/icons.css" rel="stylesheet">

	<link rel="stylesheet" href="assets/md/css/bootstrap.min.css">
         Material Design Bootstrap 
        <link rel="stylesheet" href="assets/md/css/mdb.min.css">
         Your custom styles (optional) 
        <link rel="stylesheet" href="assets/md/css/style.css">-->
<style>
    img {
        max-width: 100%; }

    .preview {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column; }
    @media screen and (max-width: 996px) {
        .preview {
            margin-bottom: 20px; } }

    .preview-pic {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1; }

    .preview-thumbnail.nav-tabs {
        border: none;
        margin-top: 15px; }
    .preview-thumbnail.nav-tabs li {
        width: 18%;
        margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
        max-width: 100%;
        display: block; }
    .preview-thumbnail.nav-tabs li a {
        padding: 0;
        margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
        margin-right: 0; }

    .tab-content {
        overflow: hidden; }
    .tab-content img {
        width: 100%;
        -webkit-animation-name: opacity;
        animation-name: opacity;
        -webkit-animation-duration: .3s;
        animation-duration: .3s; }

    .card {
        margin-top: 50px;
        background: #eee;
        padding: 3em;
        line-height: 1.5em; }

    @media screen and (min-width: 997px) {
        .wrapper {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex; } }

    .details {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column; }

    .colors {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1; }

    .product-title, .price, .sizes, .colors {
        text-transform: UPPERCASE;
        font-weight: bold; }

    .checked, .price span {
        color: #ff9f1a; }

    .product-title, .rating, .product-description, .price, .vote, .sizes {
        margin-bottom: 15px; }

    .product-title {
        margin-top: 0; }

    .size {
        margin-right: 10px; }
    .size:first-of-type {
        margin-left: 40px; }

    .color {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        height: 2em;
        width: 2em;
        border-radius: 2px; }
    .color:first-of-type {
        margin-left: 20px; }

    .add-to-cart, .like {
        background: #ff9f1a;
        padding: 1.2em 1.5em;
        border: none;
        text-transform: UPPERCASE;
        font-weight: bold;
        color: #fff;
        -webkit-transition: background .3s ease;
        transition: background .3s ease; }
    .add-to-cart:hover, .like:hover {
        background: #b36800;
        color: #fff; }

    .not-available {
        text-align: center;
        line-height: 2em; }
    .not-available:before {
        font-family: fontawesome;
        content: "\f00d";
        color: #fff; }

    .orange {
        background: #ff9f1a; }

    .green {
        background: #85ad00; }

    .blue {
        background: #0076ad; }

    .tooltip-inner {
        padding: 1.3em; }

    @-webkit-keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3); }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1); } }

    @keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3); }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1); } }

    /*# sourceMappingURL=style.css.map */
</style> 
       </head>
    
    <style>
        .user_card {
            height: 440px;
        width: 450px;
            margin-top: auto;
            margin-bottom: auto;
            /*background: #f39c12;*/
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;

        }
        .brand_logo_container {
            position: absolute;
            height: 170px;
            width: 170px;
            top: -75px;
            border-radius: 50%;
            background: #60a3bc;
            padding: 10px;
            text-align: center;
        }
        .brand_logo {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            border: 2px solid white;
        }
        .form_container {
            margin-top: 100px;
        }
        .login_btn {
            width: 100%;
            background: #60a3bc !important;
            color: white !important;
        }
        .login_btn:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .login_container {
            padding: 0 1rem;
        }
        .input-group-text {
            background: #60a3bc !important;
            color: white !important;
            border: 0 !important;
            border-radius: 0.25rem 0 0 0.25rem !important;
        }
        .input_user,
        .input_pass:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: #60a3bc !important;
        }
    </style>
    <body>
        <div style="box-shadow: 2px 2px 12px lightblue;">
            @include('includes.navbar')
        </div>
        <div class="container h-100 pt-150 mb-100" style="">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <div class="d-flex justify-content-center">
                        <div class="brand_logo_container">
                            <img width="20%" src="{{URL::asset('assets/images/ui/logo.png')}}" class="brand_logo" alt="Logo">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center form_container">						
                        <form action="{{ route('bus/logincheck') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="email" class="form-control input_user" value="" placeholder="{{trans('sentence.signup.yourEmail')}}" required>
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control input_pass" value="" placeholder="{{trans('sentence.signup.password')}}" required>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="rememberme" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">{{trans('sentence.signin.rememberMe')}}</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-1 login_container">
								<input type="submit" class="btn login_btn" name="btnlogin" value="{{trans('sentence.signin.loginButton')}}">
                            </div>                    <div class="d-flex justify-content-center mt-3 login_container">
                                <p class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                                <br/>
                                @error('password')
                                    {{ $message }}
                                @enderror
        
                                @if(session()->has('msg'))
                                {{session()->get('msg')}}
                                @endif
                            </p>
                            </div>                    
        
                        </form>
                    </div>

                    <div class="">
                        <div class="d-flex justify-content-center links">
                            {{trans('sentence.signin.dontHaveAnAccount')}} <a href="{{ route('bus/signup') }}" class="ml-2">{{trans('sentence.signup.text')}}</a>
                        </div>
                        <div class="d-flex justify-content-center links">
                            <a href="#">{{trans('sentence.Forgot_your_password')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('includes/footer')