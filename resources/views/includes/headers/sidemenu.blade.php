<div class="col-md-3 col-sm-12">
    <div class="row">
        <div class="col-md-12 my-3 col-sm-12">
            <strong>User Setting</strong>
            <ul class="list-unstyled">
                <li 
                    class=" 
                        @if($page == 'profile')
                           my-active
                        @else
                           my-activev
                        @endif
                    ">
                    <a href="{{ route('user/dashboard') }}"><i class="fa fa-user"></i> &nbsp;&nbsp; My info</a>
                </li>

                <li class=" 
                    @if($page == 'billing')
                    my-active
                    @else
                    my-activev
                    @endif
                ">
                    <a href="{{ route('user/billing') }}"><i class="fa fa-credit-card"></i> &nbsp;&nbsp; Billing Methods</a>
                </li>

                <li class=" 
                    @if($page == 'passw')
                    my-active
                    @else
                    my-activev
                    @endif
                ">
                    <a href="{{ route('user/passwordsec') }}"><i class="fa fa-lock"></i> &nbsp;&nbsp; Password & Security</a>
                </li>
                <li class=" 
                    @if($page == 'conti')
                    my-active
                    @else
                    my-activev
                    @endif
                ">
                    <a href="{{route('user/contactinfo')}}"><i class="fa fa-link"></i> &nbsp;&nbsp; Connected info</a>
                </li>
                <li class=" 
                    @if($page == 'cart')
                    my-active
                    @else
                    my-activev
                    @endif
                ">
                    <a href="{{route('user/cart')}}"><i class="fa fa-cubes"></i> &nbsp;&nbsp; My cart</a>
                </li>
                <li class=" 
                    @if($page == 'orderh')
                    my-active
                    @else
                    my-activev
                    @endif
                ">
                    <a href="{{route('user/orderhistory')}}"><i class="fa fa-box"></i> &nbsp;&nbsp; Order History</a>
                </li>
            </ul>
        </div>
    </div>
</div>
