@extends('layouts.user_login_layout')
@section('title','User Signup')
@section('content')
<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 py-5 takfua-back text-white text-center ">
                <div class=" ">
                    <div class="card-body">
                        <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                        <h2 class="py-3">Registration</h2>
                        <p>CERCA DE MI Negocios Locales is the digital place for all the peoples that want to shopping online or want to enjoy with restaurants & cafes near their locations.

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4">Please fill with your details</h4>
                <span class="text-danger"></span><br>
                <span class="text-danger"></span>
            <form action="{{ route('signup_check') }}" method="POST">
                @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <input id="Full Name" name="firstname" placeholder="First Name" class="form-control @error('firstname') is-invalid @enderror" type="text" value="{{ old('firstname') }}">
                            <span class="text-danger">
                                @error('firstname')
                                {{ $message }}
                            @enderror    
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" id="inputEmail4" placeholder="Last Name" value="{{ old('lastname') }}">
                            <span class="text-danger">
                                @error('lastname')
                                {{ $message }}
                            @enderror    
                            </span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input name="Email" placeholder="Email" class="form-control @error('Email') is-invalid @enderror" type="email" value="{{ old('Email') }}">
                            <span class="text-danger">
                                @error('Email')
                                {{ $message }}
                            @enderror    

                            @if(session()->has('email_msg'))
                            {{session()->get('email_msg')}}
                            @endif
    
                        </span>
                        </div>
                        <div class="form-group col-md-6">
                            <input id="Mobile" name="Mobile" placeholder="Mobile No." class="form-control @error('Mobile') is-invalid @enderror" type="text" value="{{ old('Mobile') }}">
                            <span class="text-danger">
                                @error('Mobile')
                                {{ $message }}
                            @enderror
                            </span>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <input name="Password" placeholder="Password" class="form-control @error('Password') is-invalid @enderror" type="password" value="{{ old('Password') }}">
                            <span class="text-danger">
                                @error('Password')
                                {{ $message }}
                            @enderror    
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <input name="c_password" placeholder="Confirm Password" class="form-control @error('c_password') is-invalid @enderror" type="password" value="{{ old('c_password') }}">
                            <span class="text-danger">
                                @error('c_password')
                                {{ $message }}
                                @enderror
                                
                                @if(session()->has('cpass_msg'))
                                {{session()->get('cpass_msg')}}
                                @endif
                                        
                            </span>
                        </div>
                       
                      
                    </div>
                         <div class="form-row">
                        <div class="form-group col-md-6">
                            <input name="Street" placeholder="Enter your street" class="form-control @error('Street') is-invalid @enderror" type="text" value="{{ old('Street') }}">
                            <span class="text-danger">
                                @error('Street')
                                {{ $message }}
                            @enderror    
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <input id="mobile" name="street_no" placeholder="Enter your street number" class="form-control @error('street_no') is-invalid @enderror" type="text" value="{{ old('street_no') }}">
                            <span class="text-danger">
                                @error('street_no')
                                {{ $message }}
                            @enderror    
                            </span>
                        </div>

                        <div class="form-group col-md-6">
                            <input name="Country" placeholder="Enter your country" class="form-control @error('Country') is-invalid @enderror" type="text" value="{{ old('Country') }}">
                            <span class="text-danger">
                                @error('Country')
                                {{ $message }}
                            @enderror    
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <input name="City" placeholder="Enter your city" class="form-control @error('City') is-invalid @enderror" type="text" value="{{ old('City') }}">
                            <span class="text-danger">
                                @error('City')
                                {{ $message }}
                            @enderror    
                            </span>                        
                        </div>
                        <div class="form-group col-md-6">
                            <input name="zip_code" placeholder="Enter your postal code" class="form-control @error('zip_code') is-invalid @enderror" type="text" value="{{ old('zip_code') }}">
                            <span class="text-danger">
                                @error('zip_code')
                                {{ $message }}
                            @enderror    
                            </span>                        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-check">
                                        <div class="col-md-12 h5">
                                            <input type="checkbox" class="form-check-input" name="confirmed">I confirmed i have read the <a href="" class="text-info">terms & conditions</a><br/>
                                            <input type="checkbox" class="form-check-input text-info" name="acceptcheckbox">I accept to receive communication from Cerca De Mi
                                        </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-row">
                        <input type="submit" class="btn takfua-back text-white " name="btnregister" value="Register now">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection