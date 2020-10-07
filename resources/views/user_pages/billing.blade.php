@extends('layouts.user_profile_layout')
@section('title','User Dashboard')
@section('content')
<div class="container my-4">
    <div class="margin-25">
        <div class="row">

            @include('includes.headers.sidemenu')            
            
            <div class="col-md-9 col-sm-12 my-3">
                <div class="col-md-12 col-sm-12 bg-white main-shadwo">
                    <div class="row bg-header">
                        <div class="col-md-12 col-sm-12">
                            <div class="navbar-nav my-4 margin-25">
                                <div class="h3">Add a billing method</div>
                            </div>
                        </div>
                    </div>

                    <form class="margin-25 my-3">
                        <div class="container">
                            <div class="row">
                                <div class="">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <img class="img-fluid cc-img" src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-md-7">
                                        <div class="form-group">
                                            <label>CARD NUMBER</label>
                                            <div class="input-group">
                                                <input type="tel" class="form-control" placeholder="Valid Card Number" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="col-xs-7 col-md-7">
                                            <div class="form-group">
                                                <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                                <input type="tel" class="form-control" placeholder="MM / YY" />
                                            </div>
                                        </div>
                                        <div class="col-xs-5 col-md-5 float-xs-right">
                                            <div class="form-group">
                                                <label>CV CODE</label>
                                                <input type="tel" class="form-control" placeholder="CVC" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="col-xs-7 col-md-5">
                                            <div class="form-group">
                                                <label>CARD OWNER</label>
                                                <input type="text" class="form-control" placeholder="Card Owner Names" />
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button class="btn btn-warning btn-lg btn-block">Process payment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>


        </div>
    </div>
</div>    

@endsection