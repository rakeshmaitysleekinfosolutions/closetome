@extends('restaurantportal.layouts.master')
@section('content')
    <div class="col-md-10 col-sm-12 bg-white main-shadwo">
        <div class="row bg-header border-bottom">
            <div class="col-md-12 col-sm-12">
                <div class="navbar-nav my-4 margin-25">
                    <div class="h3">{{ trans('sentence.restaurant.customer.columns.title') }}</div>
                </div>
            </div>
        </div>

        <div class="enter-conta">
            <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table table-striped mt-2" id="datatables">
                        <thead>
                        <tr class="takfua-back">
                            <th class="text-center">#</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.customer.columns.no')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.customer.columns.name')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.customer.columns.item')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.customer.columns.orders')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.customer.columns.date')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.customer.columns.status')) }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    var myLabel                 = myLabel || {};
    myLabel.token               = '{{Session::token()}}'
</script>
