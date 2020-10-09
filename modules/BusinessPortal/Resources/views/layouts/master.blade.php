<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Business Portal</title>

       {{-- Laravel Mix - CSS File --}}
       {{-- <link rel="stylesheet" href="{{ mix('css/businessportal.css') }}"> --}}
        <link rel="icon" href="{{ URL::asset('assets/images/ui/logo.png') }}">

        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/plugins/fontawesome/css/all.min.css') }}">
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/customstyle.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}"/>
        <!-- Datetimepicker CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
        <link href="{{ URL::asset('assets/css/import.css') }}" rel="stylesheet" type="text/css"/>
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
                @include('businessportal::inc.header');
            </div>
        </div>
        <div class="container-fluid my-5">
            <div class="margin-25">
                <div class="row">
                    <div class="col-md-2 col-sm-12  d-sm-block">
                        @include('businessportal::inc.sidebar');
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- /Footer -->
        @include('businessportal::inc.footer');
        <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
        <!-- Bootstrap Core JS -->
        <script src="{{ URL::asset('assets/js/popper.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
        <!-- Slick JS -->
        <script src="{{ URL::asset('assets/js/slick.js')}}"></script>
        <!-- Custom JS -->
        <script src="{{ URL::asset('assets/js/script.js')}}"></script>
        <!-- Select2 JS -->
        <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
        <!-- Datetimepicker JS -->
        <script src="{{ URL::asset('assets/js/moment.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Sticky Sidebar JS -->
        <script src="{{ URL::asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>
        <!-- Custom JS -->
        <script src="{{ URL::asset('assets/js/script.js')}}"></script>
        <script src="{{ URL::asset('assets/js/import.js')}}" type="text/javascript"></script>
        <script src="{{ URL::asset('assets/js/main.js')}}" type="text/javascript"></script>
        <script src="{{ URL::asset('assets/js/myscript.js')}}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/jquery.validate.js')}}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/additional-methods.js')}}" type="text/javascript"></script>
        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/businessportal.js') }}"></script> --}}
        <script type="text/javascript" src="{{ mix('js/app.js')}}"></script>

    </body>
</html>
