@extends('layouts.user_login_layout')
@section('title','User Login')
@section('content')
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
<div class="container h-100 pt-150 mb-100" style="">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img width="20%" src="{{URL::asset('assets/images/ui/logo.png') }}" class="brand_logo" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">						
            <form action="{{ route('login_check') }}" method="POST" id="singinform">
                @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" name="email" class="form-control input_user @error('email') is-invalid @enderror" value="" placeholder="email">

                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control input_pass @error('password') is-invalid @enderror" value="" placeholder="password">
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="rememberme" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                        </div>
                        <span class="text-danger"></span>
                        <br>
                    </div>
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <input type="submit" class="btn login_btn" name="btnlogin" value="Login">
                    </div>
                    <div class="d-flex justify-content-center mt-3 login_container">
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
            <div class="mt-1">
                <div class="d-flex justify-content-center links">
                    Don't have an account? <a href="{{ route('user_signup') }}" class="ml-2">Sign Up</a>
                </div>
                <div class="d-flex justify-content-center links">
                    <a href="#">Forgot your password?</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection