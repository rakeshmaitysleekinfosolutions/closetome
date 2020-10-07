@include('includes.header')
<body>    
    @include('includes.navbar')
    @if (strpos(url()->current(),'/') !== false)
        @include('includes/headers/banner_home')
    @elseif(strpos(url()->current(),'shops') !== false)
        @include('includes/headers/banner_shop')    
    @endif
    @yield('content')
</body>
@include('includes/footer')
