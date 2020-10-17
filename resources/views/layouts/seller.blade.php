<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Business Portal</title>
    <link rel="icon" href="{{ URL::asset('assets/images/ui/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
</head>
    <body class="bg-default-light">
        <div class="white shadow">
            <div class="container-fluid">
                <style>
                    .contacv{
                        margin-left: 1%;
                        margin-right: 1%;
                    }
                </style>
                @include('seller.inc.header')
            </div>
        </div>
    <div class="container-fluid my-5">
        <div class="margin-25">
            <div class="row">
                <div class="col-md-2 col-sm-12  d-sm-block">
                    @if(session()->get('business_type') == 'Restaurants')
                        @include('seller.inc.restaurant-sidebar')
                    @else
                        @include('seller.inc.shop-sidebar')
                    @endif
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    <!-- /Footer -->
    @include('seller.inc.footer')
        <!-- Footer -->

        <script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
        @stack('scripts')
        <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </body>
</html>
