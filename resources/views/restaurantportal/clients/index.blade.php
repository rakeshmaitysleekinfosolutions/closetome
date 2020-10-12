@extends('restaurantportal.layouts.master')
@section('content')
    <div class="col-md-10 col-sm-10">
        <div class="row">
            <div class="col-md-12 col-sm-12 bg-white main-shadwo">
                <div class="row bg-header border-bottom">
                    <div class="col-md-12 col-sm-12">
                        <div class="navbar-nav my-4 margin-25">
                            <div class="h3">{{ trans('sentence.Manage_products') }}</div>
                        </div>
                    </div>
                </div>

                <div class="enter-conta">
                    <div class="row justify-content-center">
                        <div class="table-responsive">
                            <a href="{{ route('bus/addproduct')}}" class="btn takfua-back text-white btn-just-icon btn-sm">{{ ucfirst(trans('sentence.business.product.label.addProduct')) }}</a>
                            <table class="table table-striped mt-2">
                                <thead>

                                <tr class="takfua-back">
                                    <th class="text-center">#</th>
                                    {{-- <th>Product Image</th> --}}
                                    <th class="text-center">{{ ucfirst(trans('sentence.business.product.label.productName')) }}</th>
                                    <th class="text-center">{{ ucfirst(trans('sentence.business.product.label.productPrice')) }}</th>
                                    <th class="text-center">{{ ucfirst(trans('sentence.business.product.label.productQuantity')) }}</th>
                                    <th class="text-center">{{ ucfirst(trans('sentence.business.product.label.action')) }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
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
