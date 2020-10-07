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
                        <div class="">
                            <div class="col-md-12 col-sm-12 bg-white main-shadwo">
                                <div class="row bg-header border-bottom">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="navbar-nav my-4 margin-25">
                                            <div class="h3"> {{trans('sentence.business.customer.label.manageCustomer')}}</div>
                                            
                                        </div>
                                    </div>
                                </div>
    
                                <div class="enter-conta">
                                    <div class="row justify-content-center">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr class="takfua-back">
                                                        <th class="text-center">#</th>
                                                        <th>{{trans('sentence.business.customer.label.name')}}</th>
                                                        <!-- <th>{{trans('sentence.business.customer.label.product')}}</th> -->
                                                        <th>{{trans('sentence.business.customer.label.orderAt')}}</th>
                                                        <th class="text-right">{{trans('sentence.business.customer.label.price')}}</th>
                                                        <th class="text-right">{{trans('sentence.business.customer.label.noOfOrders')}}</th>
                                                        <th class="text-right">{{trans('sentence.business.customer.label.total')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center" scope="5">{{trans('sentence.business.customer.label.noRecords')}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                </div>
            </div>
        </div>    
        @include('includes.footer')