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
                                <div class="h3">Account info</div>
                            </div>
                        </div>
                    </div>

                    <div class="margin-25 my-3">
                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">
                                <strong>USER NAME</strong>
                                <div>Usama Ahmed</div>
                            </label> 
                            <label for="text" class="col-12 col-form-label my-3">
                                <strong>USER EMAIL</strong>
                                <div>uahmed22@gmaill.com</div>
                            </label> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="offset-3 col-md-9 col-sm-12">
                <div class="col-md-12 col-sm-12 bg-white main-shadwo">
                    <div class="row bg-header">
                        <div class="col-md-12 col-sm-12">
                            <div class="navbar-nav my-4 margin-25">
                                <div class="h3">Account</div>
                            </div>
                        </div>
                    </div>

                    <form class="margin-25 my-3">
                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label"><strong>First name</strong></label> 
                            <div class="col-md-6">
                                <input id="text" name="text" placeholder="" class="form-control here radius-0" required="required" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label"><strong>Last name</strong></label> 
                            <div class="col-md-6">
                                <input id="text" name="text" placeholder="" class="form-control here radius-0" required="required" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label"><strong>Email</strong></label> 
                            <div class="col-md-6">
                                <input id="text" name="text" placeholder="" class="form-control here radius-0" required="required" type="text">
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