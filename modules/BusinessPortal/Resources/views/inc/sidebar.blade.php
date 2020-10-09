<div class="row">
    <div class="col-md-12 col-sm-12 bg-white main-shadwo" >
        <div class="row border-bottom card-title justify-content-center">
            <center><h2 class="">{{ trans('sentence.Menu') }}</h2></center>
        </div>
        <center>
            <div class="text-left mb-2">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('bus/dashboard') }}" class=" text-color">{{ trans('sentence.Dashboard') }}</a></li>
                    <li class="list-group-item"><a href="{{ route('bus/customers') }}" class=" text-color">{{ trans('sentence.My_customers')}}</a></li>
                    <li class="list-group-item"><a href="{{ route('bus/orders') }}" class=" text-color">{{ trans('sentence.Manage_orders') }}</a></li>
                    <li class="list-group-item"><a href="{{ route('bus/products') }}" class=" text-color">{{ trans('sentence.shope_products') }}</a></li>
                    <li class="list-group-item"><a href="{{ route('index') }}" class=" text-color">{{ trans('sentence.Manage_Store') }}</a></li>
                </ul>
            </div>
        </center>
    </div>
</div>


