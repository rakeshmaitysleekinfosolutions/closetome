<div class="row">
    <div class="col-md-12 col-sm-12 bg-white main-shadwo" >
        <div class="row border-bottom card-title justify-content-center">
            <center><h2 class="">{{ trans('sentence.Menu') }}</h2></center>
        </div>
        <center>
            <div class="text-left mb-2">
                <ul class="list-group">
                    <ul class="list-group">
                        {{--                        <li class="list-group-item"><a href="{{ route('restaurantportal.dashboard') }}" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.dashboard')) }}</a></li>--}}
                        <li class="list-group-item"><a href="#tables" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.tables')) }}</a></li>
                        <li class="list-group-item"><a href="{{ route('clients') }}" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.clients')) }}</a></li>
                        <li class="list-group-item"><a href="#orders" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.orders')) }}</a></li>
                        <li class="list-group-item"><a href="#reservations" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.reservations')) }}</a></li>
                        <li class="list-group-item"><a href="{{ route('menus') }}" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.menus'))}}</a></li>

                        <li class="list-group-item"><a href="{{ route('restaurants') }}" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.restaurants')) }}</a></li>
                        <li class="list-group-item"><a href="#comments" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.comments')) }}</a></li>
                        {{--                        <li class="list-group-item"><a href="#tasks" class=" text-color">{{ ucfirst(trans('sentence.restaurant.sidebar.label.tasks')) }}</a></li>--}}
                    </ul>
                </ul>
            </div>
        </center>
    </div>
</div>


