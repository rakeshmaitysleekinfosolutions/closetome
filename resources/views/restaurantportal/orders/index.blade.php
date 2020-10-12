@extends('restaurantportal.layouts.master')
@section('content')
    <div class="col-md-10 col-sm-12">
        <div class="">
            <div class="col-md-10 col-sm-12">
                <div class="col-md-12 col-sm-12 bg-white main-shadwo">
                    <div class="enter-conta">
                        <div class="row" >
                            <div class="col-lg-2 col-sm-6">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading dark-blue">
                                            <i class="fa fa-users fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content dark-blue">
                                        <div class="circle-tile-description text-faded">
                                            {{trans('sentence.restaurant.dashboard.label.users')}}
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            0
                                            <span id="sparklineA"></span>
                                        </div>
                                        <a href="#" class="circle-tile-footer">{{trans('sentence.restaurant.dashboard.link.moreInfo')}} <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading green">
                                            <i class="fa fa-cash-register fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content green">
                                        <div class="circle-tile-description text-faded">
                                            {{trans('sentence.restaurant.dashboard.label.revenue')}}
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            &euro;0
                                        </div>
                                        <a href="#" class="circle-tile-footer">{{trans('sentence.restaurant.dashboard.link.moreInfo')}} <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading orange">
                                            <i class="fa fa-bell fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content orange">
                                        <div class="circle-tile-description text-faded">
                                            {{trans('sentence.restaurant.dashboard.label.artists')}}
                                        </div>
                                        <div class="circle-tile-number text-faded">

                                        </div>
                                        <a href="#" class="circle-tile-footer">{{trans('sentence.restaurant.dashboard.link.moreInfo')}} <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading blue">
                                            <i class="fa fa-tasks fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content blue">
                                        <div class="circle-tile-description text-faded">
                                            {{trans('sentence.restaurant.dashboard.label.tasks')}}
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            0
                                            <span id="sparklineB"></span>
                                        </div>
                                        <a href="#" class="circle-tile-footer">{{trans('sentence.restaurant.dashboard.link.moreInfo')}} <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading red">
                                            <i class="fa fa-shopping-cart fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content red">
                                        <div class="circle-tile-description text-faded">
                                            {{trans('sentence.restaurant.dashboard.label.orders')}}
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            0
                                            <span id="sparklineC"></span>
                                        </div>
                                        <a href="#" class="circle-tile-footer">{{trans('sentence.restaurant.dashboard.link.moreInfo')}} <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading purple">
                                            <i class="fa fa-comments fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content purple">
                                        <div class="circle-tile-description text-faded">
                                            {{trans('sentence.restaurant.dashboard.label.mentions')}}
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            0
                                            <span id="sparklineD"></span>
                                        </div>
                                        <a href="#" class="circle-tile-footer">{{trans('sentence.restaurant.dashboard.link.moreInfo')}} <i class="fa fa-chevron-circle-right"></i></a>
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
<script>
    var myLabel                 = myLabel || {};
    myLabel.token               = '{{Session::token()}}'
    myLabel.parentCategory      = '{{route('fetch-categories')}}';
    myLabel.childCategory       = '{{route('fetch-subcategories')}}';
    myLabel.selectOption       = '{{ trans('sentence.restaurant.store.label.selectOption') }}';

</script>
