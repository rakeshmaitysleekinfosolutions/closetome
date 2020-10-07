{{-- @extends('layouts.shop_layout')
@section('title','Shops')
@section('content') --}}
@include('includes.header')

<body>    
    @include('includes.navbar')
    @include('includes/headers/banner_shop')    


<div class="d-none d-sm-block">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img class="d-block w-100" src="{{URL::asset('assets/images/slider/822.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{URL::asset('assets/images/slider/821.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{URL::asset('assets/images/slider/823.jpg')}}" alt="Third slide">
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-none d-sm-block" style="padding: 17% 5% 13% 5%;">
    <!-- Search -->
    <div class="search-box">
        <div class="col-md-12">
            <form class="row justify-content-center" action="" style="margin-top: -44%;">
                <div class="form-group search-location col-md-12">
                    <div class="row justify-content-center">
                        <input type="text" class="form-control col-md-4 border-dark" placeholder=" Iphone, Smart TV, Kids ...">
                    </div>
                </div>
                <br/>
                <div class="form-group search-info col-md-12">
                    <div class="row justify-content-center">
                        <input type="text" class="form-control col-md-4 border-dark" placeholder="Insert your address">
                    </div>
                </div>
                <button type="submit" class="btn takfua-back text-white col-md-4" style="margin-right: 0.9%;"> <i class="fas fa-search"></i> Search</button>
            </form>
        </div>
    </div>
</div>

<div class="d-block d-sm-none">
<div id="carouselExampleIndicators" class="carousel slide container" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">

        <div class="carousel-item active">
            <img style="height:300px;" class="d-block w-100" src="{{ URL::asset('assets/images/slider/822.jpg')}}" alt="First slide">
        </div>
        <div class="carousel-item">
            <img style="height:300px;" class="d-block w-100" src="{{URL::asset('assets/images/slider/821.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img style="height:300px;" class="d-block w-100" src="{{URL::asset('assets/images/slider/823.jpg') }}" alt="Third slide">
        </div>
    </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-block d-sm-none" style="padding: 17% 5% 13% 5%;">
    <!-- Search -->
    <div class="search-box">
        <div class="col-md-12">
            <form class="row justify-content-center" action="" style="margin-top: -100%;">
                <div class="form-group search-location col-md-12">
                    <div class="row justify-content-center">
                        <input type="text" class="form-control col-md-4 border-dark" placeholder=" Iphone, Smart TV, Kids ...">
                    </div>
                </div>
                <br/>
                <div class="form-group search-info col-md-12">
                    <div class="row justify-content-center">
                        <input type="text" class="form-control col-md-4 border-dark" placeholder="Insert your address">
                    </div>
                </div>
                <button type="submit" class="btn takfua-back text-white col-md-4" style="margin-right: 0.9%;"> <i class="fas fa-search"></i> Search</button>
            </form>
        </div>
    </div>
</div>
<!-- Popular Section -->
<section class="section section-doctor">
    <div class="container">
        <div class="row">

            <div class="col-lg-12" style="margin-top: -37%;">
                <div class="section-header border-bottom">
                    <h3>Shops close to me</h3>
                </div>
                <div class="">
                    <div class="doctor-slider slider">
                        <!-- Doctor Widget -->
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="" class="btn bg-white btn-sm m-1" style="z-index: 1; position: absolute;">120 mts</a>
                                <h3 class="title text-center">
                                    <!--<a href="doctor-profile.html">juicy joy</a>-->
                                </h3>
                                <a href="product.php">
                                    <img class="img-fluid" style="height: 180px;" alt="User Image" src="{{URL::asset('assets/images/shop/2.jpg') }}">
                                </a>
                                <a href="javascript:void(0)" class="fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            </div>
                            <div class="pro-content">
                                <div class="pro-content">
                                    <h3 class="speciality text-center"></h3>
                                    <div class="rating text-center">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class=" row-sm">
                                        <h4 class="speciality text-center">Elite market 2-s7</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Doctor Widget -->
            
                        <!-- Doctor Widget -->
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="" class="btn bg-white btn-sm  m-1" style="z-index: 1; position: absolute;">190 mts</a>
                                <h3 class="title text-center">
                                    <!--<a href="doctor-profile.html">Bicycle</a>-->
                                </h3>
                                <a href="product.php">
                                    <img class="img-fluid" style="height: 180px;" alt="User Image" src="{{URL::asset('assets/images/shop/3.jpg') }}">
                                </a>
                                <a href="javascript:void(0)" class="fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            </div>
                            <div class="pro-content">
                                <div class="pro-content">
                                    <h3 class="speciality text-center"></h3>
                                    <div class="rating text-center">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class=" row-sm">
                                        <h4 class="speciality text-center">Davod street shop 11</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Doctor Widget -->
            
                        <!-- Doctor Widget -->
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="" class="btn bg-white btn-sm m-1" style="z-index: 1; position: absolute;">230 mts</a>
                                <h3 class="title text-center">
                                    <!--<a href="doctor-profile.html">Simons</a>-->
                                </h3>
                                <a href="product.php">
                                    <img class="img-fluid" style="height: 180px;" alt="User Image" src="{{URL::asset('assets/images/shop/4.jpg') }}">
                                </a>
                                <a href="javascript:void(0)" class="fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            </div>
                            <div class="pro-content">
                                <div class="pro-content">
                                    <h3 class="speciality text-center"></h3>
                                    <div class="rating text-center">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class=" row-sm">
                                        <h4 class="speciality text-center">town market shop 2</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Doctor Widget -->
            
                        <!-- Doctor Widget -->
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="" class="btn bg-white btn-sm m-1" style="z-index: 1; position: absolute;">280 mts</a>
                                <h3 class="title text-center">
                                    <!--<a href="doctor-profile.html">Excellent</a>-->
                                </h3>
                                <a href="product.php">
                                    <img class="img-fluid" style="height: 180px;" alt="User Image" src="{{URL::asset('assets/images/shop/5.jpg') }}">
                                </a>
                                <a href="javascript:void(0)" class="fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            </div>
                            <div class="pro-content">
                                <div class="pro-content">
                                    <h3 class="speciality text-center"></h3>
                                    <div class="rating text-center">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class=" row-sm">
                                        <h4 class="speciality text-center">C-11 area gulberg</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Doctor Widget -->
            
                        <!-- Doctor Widget -->
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="" class="btn bg-white btn-sm  m-1" style="z-index: 1; position: absolute;">300 mts</a>
                                <h3 class="title text-center">
                                    <!--<a href="doctor-profile.html">Simmons</a>-->
                                </h3>
                                <a href="product.php">
                                    <img class="img-fluid" style="height: 180px;" alt="User Image" src="{{URL::asset('assets/images/shop/6.jpg') }}">
                                </a>
                                <a href="javascript:void(0)" class="fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            </div>
                            <div class="pro-content">
                                <div class="pro-content">
                                    <h3 class="speciality text-center"></h3>
                                    <div class="rating text-center">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class=" row-sm">
                                        <h4 class="speciality text-center">Green town 22-c-9</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Doctor Widget -->
            
            
            
                        <!-- Doctor Widget -->
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="" class="btn bg-white btn-sm  m-1" style="z-index: 1; position: absolute;">340 mts</a>
                                <h3 class="title text-center">
                                    <!--<a href="doctor-profile.html">Watch shop</a>-->
                                </h3>
                                <a href="product.php">
                                    <img class="img-fluid" style="height: 180px;" alt="User Image" src="{{URL::asset('assets/images/shop/7.jpg') }}">
                                </a>
                                <a href="javascript:void(0)" class="fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            </div>
                            <div class="pro-content">
                                <div class="pro-content">
                                    <h3 class="speciality text-center"></h3>
                                    <div class="rating text-center">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class=" row-sm">
                                        <h4 class="speciality text-center">Town ship 17-c-3</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Doctor Widget -->
                    </div>
                </div>
            </div>
            <div class="col-lg-12 my-5" style="">
                <div class="container">
                    <div class="section-header n2 border-bottom">
                        <h3>Shops Close to me</h3>
                    </div>
                    <center>
                        <div class="row">
                            <div class="col-md-4 mt-2">
                                <div class="doc-img" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://cdn.otstatic.com/cfe/4/images/8-small-75c143.jpg'); height: 180px;">
                                    <a href="product.php">
                                        <h5 class="text-white" style="padding:80px;">New York Area<br />2200 shops</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="doc-img" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://cdn.otstatic.com/cfe/4/images/6-small-f7ea90.jpg'); height: 180px;">
                                    <a href="product.php">
                                        <h5 class="text-white" style="padding:80px;">los-angeles<br />6500 shops</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="doc-img" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://cdn.otstatic.com/cfe/4/images/3-small-467434.jpg'); height: 180px;">
                                    <a href="product.php">
                                        <h5 class="text-white" style="padding:80px;">chicago<br />1200 shops</h5>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <div class="doc-img" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://cdn.otstatic.com/cfe/4/images/4-small-33214b.jpg'); height: 180px;">
                                    <a href="product.php">
                                        <h5 class="text-white" style="padding:80px;">san-francisco<br />13200 shops</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="doc-img" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://cdn.otstatic.com/cfe/4/images/17-small-17a99b.jpg'); height: 180px;">
                                    <a href="product.php">
                                        <h5 class="text-white" style="padding:80px;">miami<br />1900 shops</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="doc-img" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://cdn.otstatic.com/cfe/4/images/10-small-ad7868.jpg'); height: 180px;">
                                    <a href="product.php">
                                        <h5 class="text-white" style="padding:80px;">las-vegas<br />3800 shops</h5>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </center>
                </div>
            </div>

            
            <div class="col-lg-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="list-unstyled" style="font-size: 17px; line-height: 30px;">
                                <li>Atlanta (7,079)</li>
                                <li>Denver (5,766)</li>
                                <li>Los Angeles (12,565)</li>
                                <li>New York Area (36,794)</li>
                                <li>Richmond (4,348)</li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="list-unstyled" style="font-size: 17px;line-height: 30px;">
                                <li>Charleston (4,310)</li>
                                <li>Detroit (4,507)</li>
                                <li>Miami (7,839)</li>
                                <li>Orlando (4,978)</li>
                                <li>San Francisco (10,785)</li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="list-unstyled" style="font-size: 17px;line-height: 30px;">
                                <li>Atlanta (7,079)</li>
                                <li>Denver (5,766)</li>
                                <li>Los Angeles (12,565)</li>
                                <li>New York Area (36,794)</li>
                                <li>Richmond (4,348)</li>
                            </ul>
                        </div>

                        <div class="col-md-3">
                            <ul class="list-unstyled" style="font-size: 17px;line-height: 30px;">
                                <li>Atlanta (7,079)</li>
                                <li>Denver (5,766)</li>
                                <li>Los Angeles (12,565)</li>
                                <li>New York Area (36,794)</li>
                                <li>Richmond (4,348)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 my-5" style="">
                <div class="container">
                    <div class="section-header n2 border-bottom">
                        <h3>Popular Categories</h3>
                    </div>

                    <center>
                        <div class="row">
                            @foreach ($p_categories as $item)
                            <div class="col-md-4 mt-2">
                            <div class="doc-img" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ $item->category_image }}'); height: 180px;width:100%">
                                    <a href="product.php">
                                        <h5 class="text-white" style="padding:80px;">{{ $item->category_name }}</h5>
                                    </a>
                                </div>
                            </div>                                
                            @endforeach
                        </div>
                    </center>
                </div>
            </div>

            <div class="container my-5" style="padding-top: 130px;">
                <div class="col-lg-12" style="background: url('{{URL::asset('assets/images/122.png')}}'); height:280px; background-size: cover;">
                    <div style="padding-top: 10%;">
                        <center>
                            <h3 class="text-white">Shops Join Us</h3>
                            <button class="btn btn-danger radius-0 text-white">Shop Now</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Popular Section -->
{{-- @endsection --}}
</body>
@include('includes/footer')
