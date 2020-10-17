@include('includes.header')
<body class="bg-default-light">
        <div class="white shadow">
            <div class="container-fluid">
                <style>
                    .contacv{
                        margin-left: 1%;
                        margin-right: 1%;
                    }
                </style>

                @include('business.busi_header')
            </div>
        </div>

        <div class="container-fluid my-5">
            <div class="margin-25">
                <div class="row">
                    <div class="col-md-2 col-sm-12  d-sm-block">

                        @include('business.bus_sidebar')

                    </div>

                    <div class="col-md-10 col-sm-12">
                        <div class="col-md-12 col-sm-12 bg-white main-shadwo">
                            <div class="enter-conta">
                                <div class="row" >
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading dark-blue">
                                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                                </div>
                                            </a>
                                            <div class="circle-tile-content dark-blue">
                                                <div class="circle-tile-description text-faded">
                                                    {{trans('sentence.business.dashboard.label.users')}}
                                                </div>
                                                <div class="circle-tile-number text-faded">
                                                    0
                                                    <span id="sparklineA"></span>
                                                </div>
                                                <a href="#" class="circle-tile-footer">{{trans('sentence.business.dashboard.link.moreInfo')}} <i class="fa fa-chevron-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading green">
                                                    <i class="fa fa-cash-register fa-fw fa-3x"></i>
                                                </div>
                                            </a>
                                            <div class="circle-tile-content green">
                                                <div class="circle-tile-description text-faded">
                                                    {{trans('sentence.business.dashboard.label.revenue')}}
                                                </div>
                                                <div class="circle-tile-number text-faded">
                                                    &euro;0
                                                </div>
                                                <a href="#" class="circle-tile-footer">{{trans('sentence.business.dashboard.link.moreInfo')}} <i class="fa fa-chevron-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    /*
                                    <div class="col-lg-2 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading orange">
                                                    <i class="fa fa-bell fa-fw fa-3x"></i>
                                                </div>
                                            </a>
                                            <div class="circle-tile-content orange">
                                                <div class="circle-tile-description text-faded">
                                                    {{trans('sentence.business.dashboard.label.artists')}}
                                                </div>
                                                <div class="circle-tile-number text-faded">
                                                   0
                                                </div>
                                                <a href="#" class="circle-tile-footer">{{trans('sentence.business.dashboard.link.moreInfo')}} <i class="fa fa-chevron-circle-right"></i></a>
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
                                                    {{trans('sentence.business.dashboard.label.tasks')}}
                                                </div>
                                                <div class="circle-tile-number text-faded">
                                                    0
                                                    <span id="sparklineB"></span>
                                                </div>
                                                <a href="#" class="circle-tile-footer">{{trans('sentence.business.dashboard.link.moreInfo')}} <i class="fa fa-chevron-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    */?>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading red">
                                                    <i class="fa fa-shopping-cart fa-fw fa-3x"></i>
                                                </div>
                                            </a>
                                            <div class="circle-tile-content red">
                                                <div class="circle-tile-description text-faded">
                                                    {{trans('sentence.business.dashboard.label.orders')}}
                                                </div>
                                                <div class="circle-tile-number text-faded">
                                                    0
                                                    <span id="sparklineC"></span>
                                                </div>
                                                <a href="#" class="circle-tile-footer">{{trans('sentence.business.dashboard.link.moreInfo')}} <i class="fa fa-chevron-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading purple">
                                                    <i class="fa fa-comments fa-fw fa-3x"></i>
                                                </div>
                                            </a>
                                            <div class="circle-tile-content purple">
                                                <div class="circle-tile-description text-faded">
                                                    {{trans('sentence.business.dashboard.label.mentions')}}
                                                </div>
                                                <div class="circle-tile-number text-faded">
                                                    0
                                                    <span id="sparklineD"></span>
                                                </div>
                                                <a href="#" class="circle-tile-footer">{{trans('sentence.business.dashboard.link.moreInfo')}} <i class="fa fa-chevron-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- <div class="my-5">
                            <div class="col-md-12 col-sm-12 bg-white main-shadwo">
                                <div class="row bg-header border-bottom">
                                <div class="col-md-12 col-sm-12">
                                    <div class="navbar-nav my-4 margin-25">
                                            <div class="h3">Your shop Cover image</div>
                                            <div class="row justify-content-end" id="margin-n">
                                                <button class="btn takfua-back shadow text-white btn-border col-md-2 col-sm-8">Add cover image</button>
                                            </div>
                                    </div>
                                </div>
                            </div>

                                <div class="enter-conta">
                                    <div class="row justify-content-center">
                                        <img width="100%" src="{{URL::asset('assets/images/vendors/'.$vendor->coverimage)}}" alt=""/>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
        @include('includes.footer')
