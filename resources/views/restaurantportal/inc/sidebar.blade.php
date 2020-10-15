<div class="row">
    <div class="col-md-12 col-sm-12 bg-white main-shadwo" >
        <div class="row border-bottom card-title justify-content-center">
            <center><h2 class="">{{ trans('sentence.Menu') }}</h2></center>
        </div>
        <center>
            <div class="text-left mb-2">
                <ul class="list-group">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ route('restaurantportal.dashboard') }}" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.dashboard')) }}</a></li>
                        <li class="list-group-item"><a href="{{ route('clients') }}" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.clients')) }}</a></li>
                        <li class="list-group-item"><a href="{{ route('menus') }}" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.adminMenu'))}}</a></li>
                        <li class="list-group-item"><a href="{{ route('orders') }}" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.adminOrders')) }}</a></li>
                        <li class="list-group-item"><a href="{{ route('restaurants') }}" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.adminRestaurant')) }}</a></li>
                        <li class="list-group-item"><a href="{{ route('mentions') }}" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.mentions')) }}</a></li>
                        <li class="list-group-item"><a href="{{ route('tasks') }}" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.tasks')) }}</a></li>
                    </ul>
                </ul>
            </div>
        </center>
    </div>
</div>


