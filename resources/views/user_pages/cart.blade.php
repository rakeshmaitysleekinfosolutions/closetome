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
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3><span class="glyphicon glyphicon-shopping-cart"></span>My Shopping Cart</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn takfua-back text-white float-right">
                                            <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mt-1 mb-40">
                                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img width="50%" class="img-responsive" src="{{URL::asset('assets/images/ui/Picture4.jpg')}}">
                                            </div>
                                            <div class="col-md-4">
                                                <h4 class="product-name"><strong>Iphone11</strong></h4><h4><small>Red color iphone11</small></h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h6><strong>495.00€ <span class="text-muted">x</span></strong></h6>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" value="1">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="button" class="btn btn-link btn-lg">
                                                            <span class="fa fa-trash"> </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img width="80%" class="img-responsive" src="{{URL::asset('assets/images/pro/04.png')}}">
                                            </div>
                                            <div class="col-md-4">
                                                <h4 class="product-name"><strong>Gaming Keyboard</strong></h4><h4><small>Best Keyboard</small></h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h6><strong>211.00€ <span class="text-muted">x</span></strong></h6>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" value="1">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="button" class="btn btn-link btn-lg">
                                                            <span class="fa fa-trash"> </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img width="70%" class="img-responsive" src="{{URL::asset('assets/images/pro/03.png')}}">
                                            </div>
                                            <div class="col-md-4">
                                                <h4 class="product-name"><strong>USB</strong></h4><h4><small>USB with 32GB Storage</small></h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h6><strong>25.00€ <span class="text-muted">x</span></strong></h6>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" value="1">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="button" class="btn btn-link btn-lg">
                                                            <span class="fa fa-trash"> </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row text-center">
                                            <div class="col-md-9">
                                                <h4 class="text-right">Total <strong>731.00€</strong></h4>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="button" class="btn takfua-back text-white col-md-12">
                                                    Checkout
                                                </button>
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
    </div>
</div>    

@endsection