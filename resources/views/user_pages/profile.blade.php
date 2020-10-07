@extends('layouts.user_profile_layout')
@section('title','User Dashboard')
@section('content')
<div class="container my-4">
    <div class="margin-25">
        <div class="row">

            @include('includes.headers.sidemenu')            
            
            <div class="col-md-9 col-sm-12">
                <div class="col-md-12 col-sm-12 bg-white main-shadwo">
                    <div class="row bg-header">
                        <div class="col-md-12 col-sm-12">
                            <div class="navbar-nav my-4 margin-25">
                                    <div class="h3">Account</div>
                                    <div class="row justify-content-end" id="margin-n">
                                        <a href="" class="text-color">Edit</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="row">
                            <div class="">
                                <center>
                                    <img class="profile-imgr shadow" src="{{URL::asset('assets/images/users/'.$user->image)}}" alt="">
                                </center>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row border-bottom my-3"></div>
                    
                    <div class="enter-conta">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <h4>{{$user->profile_name}}</h4>
                            </div>

                            <div class="col-md-7 col-sm-7">
                                <h5 class="font-size text-secondary">
                                    {{$user->profile_name}} - Client</h5>
                            </div>
                            <div class="col-md-7 col-sm-7 top-p">
                                <h4> Email</h4>
                            </div>

                            <div class="col-md-7 col-sm-7">
                                <h5 class="font-size text-secondary">
                                    {{$user->raw_email}}</h5>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-12 col-sm-12 bg-white main-shadwo my-5">
                    <div class="row bg-header">
                        <div class="col-md-12 col-sm-12">
                            <div class="navbar-nav my-4 margin-25">
                                <div class="h3">Your contacts</div>
                                <div class="row justify-content-end" id="margin-n">
                                    <a href="" class="text-color">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="enter-conta">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <h4>Account Holder</h4>
                                <h6 class="text-muted">{{$user->profile_name}}</h6>
                            </div>

                        </div>
                    </div>
                    
                    <div class="row border-bottom my-2"></div>
                    
                    <div class="enter-conta">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <h4>Phone</h4>
                                <h6 class="text-muted">{{$user->mobile}}</h6>
                            </div>

                        </div>
                    </div>
                    
                    <div class="row border-bottom my-2"></div>
                    
                    <div class="enter-conta">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <h4>Time Zone</h4>
                                <h6 class="text-muted">
                                    <?php 
                                        $date = new DateTime();
                                        $timeZone = $date->getTimezone();
                                        echo $timeZone->getName();
                                    ?>
                                </h6>
                            </div>

                        </div>
                    </div>
                    
                    <div class="row border-bottom my-2"></div>
                    
                    <div class="enter-conta">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <h4>Location</h4>
                            <h6 class="text-muted">{{ $user->country }}</h6>
                            </div>

                        </div>
                    </div>
                    
                    <div class="row border-bottom my-2"></div>
                    
                    <div class="enter-conta">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <h4>Address</h4>
                            <h6 class="text-muted">{{$user->street_no ." ". $user->street . " " . $user->city}}</h6>
                            </div>

                        </div>
                    </div>
                    
                    
                </div>
            </div>

        </div>
    </div>
</div>    

@endsection