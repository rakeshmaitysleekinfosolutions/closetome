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
                                <div class="h3">Password</div>
                            </div>
                        </div>
                    </div>

                    <form class="margin-25 my-3">
                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label"><strong>Old Password</strong></label> 
                            <div class="col-md-6">
                                <input id="text" name="text" placeholder="Enter old password" class="form-control here radius-0" required="required" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label"><strong>New Password</strong></label> 
                            <div class="col-md-6">
                                <input id="text" name="text" placeholder="Enter old password" class="form-control here radius-0" required="required" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label"><strong>Confirm New Password</strong></label> 
                            <div class="col-md-6">
                                <input id="text" name="text" placeholder="Enter old password" class="form-control here radius-0" required="required" type="text">
                            </div>
                        </div>
                        
                        <button class="btn takfua-back radius-0 my-4 col-md-3 text-white main-shadwo">Save</button>

                    </form>

                </div>
            </div>



        </div>
    </div>
</div>    

@endsection