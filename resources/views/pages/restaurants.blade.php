@extends('layouts.restaurant_layout')
@section('title','Restaurants')
@section('content')

<!-- Home Banner -->
<section class="section section-search" 
         style="width:100%;
                height:auto;
                background: url('{{URL::asset('assets/images/restaurant.jpg') }}');
                background-repeat: no-repeat;
                background-position: center;
                background-size:cover;">
				<div class="container-fluid">
					<div class="banner-wrapper">
						<div class="banner-header text-center mt-5">
                                                    <h1 class="text-white">Find your table for any occasion</h1>
						</div>
						<!-- Search -->
                                                <div class="row justify-content-center">
                                                    <div class="search-box">
                                                            <form action="">
                                                                <div class="form-group">
                                                                    <div class="input-group date" id="datetimepicker1">
                                                                        <input type="text" class="form-control" style=" border-radius: 0px;" placeholder="DD-MM-YYYY">
                                                                        <div class="input-group-append input-group-addon">
                                                                            <span class="input-group-text bg-white"><i class="fa fa-calendar-alt"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group timepicker">
                                                                        <input type="text" class="form-control" placeholder="HH:MM" style=" border-radius: 0px;">
                                                                        <div class="input-group-append input-group-addon">
                                                                            <span class="input-group-text bg-white"><i class="fa fa-clock"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
 
                                                                <div class="form-group">
                                                                    <select class="form-control" style=" border-radius: 0px;" id="exampleFormControlSelect1">
                                                                        <option>1 Person</option>
                                                                        <option>2 peoples</option>
                                                                        <option>3 peoples</option>
                                                                        <option>4 peoples</option>
                                                                        <option>5 peoples</option>
                                                                        <option>6 peoples</option>
                                                                        <option>7 peoples</option>
                                                                    </select>
                                                                </div>
                                                                    &nbsp;
                                                                    <div class="form-group search-location">
                                                                            <input type="text" class="form-control" style=" border-radius: 0px;" placeholder="Location, restaurants, shops">
                                                                    </div>
                                                                    <!--<button type="submit" class="btn takfua-back text-white" style="height: 45px;"> Find <i class="fas fa-search"></i> </button>-->
                                                                    <button type="submit" class="btn takfua-back text-white col-md-1 col-12" style="height: 45px;margin-right: 0.9%;"> Find <i class="fas fa-search"></i></button>
                                                            </form>
                                                    </div>
                                                </div>
						<!-- /Search -->
					</div>
				</div>
			</section>
			<!-- /Home Banner -->
                        <script>
                                                $(function () {
                           var bindDatePicker = function() {
                                        $(".date").datetimepicker({
                                format:'YYYY-MM-DD',
                                                icons: {
                                                        time: "fa fa-clock-o",
                                                        date: "fa fa-calendar",
                                                        up: "fa fa-arrow-up",
                                                        down: "fa fa-arrow-down"
                                                }
                                        }).find('input:first').on("blur",function () {
                                                // check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
                                                // update the format if it's yyyy-mm-dd
                                                var date = parseDate($(this).val());

                                                if (! isValidDate(date)) {
                                                        //create date based on momentjs (we have that)
                                                        date = moment().format('YYYY-MM-DD');
                                                }

                                                $(this).val(date);
                                        });
                                }
   
                           var isValidDate = function(value, format) {
                                        format = format || false;
                                        // lets parse the date to the best of our knowledge
                                        if (format) {
                                                value = parseDate(value);
                                        }

                                        var timestamp = Date.parse(value);

                                        return isNaN(timestamp) == false;
                           }
   
                           var parseDate = function(value) {
                                        var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
                                        if (m)
                                                value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

                                        return value;
                           }
   
                           bindDatePicker();
                         });
                         
                         var defaults = {
	calendarWeeks: true,
	showClear: true,
	showClose: true,
	allowInputToggle: true,
	useCurrent: false,
	ignoreReadonly: true,
	minDate: new Date(),
	toolbarPlacement: 'top',
	locale: 'nl',
	icons: {
		time: 'fa fa-clock-o',
		date: 'fa fa-calendar',
		up: 'fa fa-angle-up',
		down: 'fa fa-angle-down',
		previous: 'fa fa-angle-left',
		next: 'fa fa-angle-right',
		today: 'fa fa-dot-circle-o',
		clear: 'fa fa-trash',
		close: 'fa fa-times'
	}
};

$(function() {
	var optionsDatetime = $.extend({}, defaults, {format:'DD-MM-YYYY HH:mm'});
	var optionsDate = $.extend({}, defaults, {format:'DD-MM-YYYY'});
	var optionsTime = $.extend({}, defaults, {format:'HH:mm'});
	
	$('.datepicker').datetimepicker(optionsDate);
	$('.timepicker').datetimepicker(optionsTime);
	$('.datetimepicker').datetimepicker(optionsDatetime);
});
                        </script>



<!-- Popular Section -->
<section class="section section-doctor">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-12 ">
                <div class="container">
                    <div class="section-header n2 border-bottom">
                        <h3>Restaurants Close to me</h3>
                    </div>
                <div class="doctor-slider slider">
                    <!-- Doctor Widget -->
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="" class="btn btn-sm btn-white m-1" style="z-index: 1; position: absolute;">230 mts</a>
                            <a href="doctor-profile.html">
                                <img class="img-fluid" style="height: 180px;" alt="User Image" src="{{URL::asset('assets/images/resta/28969287.jpg') }}">
                            </a>
                            <a href="javascript:void(0)" class="fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                        </div>
                        <div class="pro-content">
                            <div class="pro-content">
                                <h4 class="">Flavors Grill</h4>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(52) reviews</span>
                                </div>
                                <div class="row-sm">
                                    <h5 class="speciality">Grill .Abu Dhabi</h5>
                                </div>
                                <div class="row-sm">
                                    <a href=""><h5 class="speciality text-blue">Booked now</h5></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Doctor Widget -->
                    
                    <!-- Doctor Widget -->
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="" class="btn btn-sm btn-white m-1" style="z-index: 1; position: absolute;">230 mts</a>
                            <a href="doctor-profile.html">
                                <img class="img-fluid" style="height: 180px;" alt="User Image" src="{{URL::asset('assets/images/resta/2.jpg') }}">
                            </a>
                            <a href="javascript:void(0)" class="fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                        </div>
                        <div class="pro-content">
                            <div class="pro-content">
                                <h4 class="">Mahanakhon Bangkok</h4>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(21) reviews</span>
                                </div>
                                <div class="row-sm">
                                    <h5 class="speciality">International .Bangkok</h5>
                                </div>
                                <div class="row-sm">
                                    <a href=""><h5 class="speciality text-blue">Booked now</h5></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Doctor Widget -->
                    
                    <!-- Doctor Widget -->
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="" class="btn btn-sm btn-white m-1" style="z-index: 1; position: absolute;">230 mts</a>
                            <a href="doctor-profile.html">
                                <img class="img-fluid" style="height: 180px;" alt="User Image" src="{{URL::asset('assets/images/resta/3.jpg') }}">
                            </a>
                            <a href="javascript:void(0)" class="fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                        </div>
                        <div class="pro-content">
                            <div class="pro-content">
                                <h4 class="">Lusin Diyafa Plaza</h4>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(22) reviews</span>
                                </div>
                                <div class="row-sm">
                                    <h5 class="speciality">Middle Eastern .Riyadh</h5>
                                </div>
                                <div class="row-sm">
                                    <a href=""><h5 class="speciality text-blue">Booked now</h5></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Doctor Widget -->
                    
                    <!-- Doctor Widget -->
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="" class="btn btn-sm btn-white m-1" style="z-index: 1; position: absolute;">230 mts</a>
                            <a href="doctor-profile.html">
                                <img class="img-fluid" style="height: 180px;" alt="User Image" src="{{URL::asset('assets/images/resta/4.jpg') }}">
                            </a>
                            <a href="javascript:void(0)" class="fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                        </div>
                        <div class="pro-content">
                            <div class="pro-content">
                                <h4 class="">Cipriani Dubai DIFC</h4>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(52) reviews</span>
                                </div>
                                <div class="row-sm">
                                    <h5 class="speciality">Italian .Dubai</h5>
                                </div>
                                <div class="row-sm">
                                    <a href=""><h5 class="speciality text-blue">Booked now</h5></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Doctor Widget -->
                    
                    <!-- Doctor Widget -->
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="" class="btn btn-sm btn-white m-1" style="z-index: 1; position: absolute;">230 mts</a>
                            <a href="doctor-profile.html">
                                <img class="img-fluid" style="height: 180px;" alt="User Image" src="{{URL::asset('assets/images/resta/2.jpg') }}">
                            </a>
                            <a href="javascript:void(0)" class="fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                        </div>
                        <div class="pro-content">
                            <div class="pro-content">
                                <h4 class="">Mahanakhon Bangkok</h4>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(21) reviews</span>
                                </div>
                                <div class="row-sm">
                                    <h5 class="speciality">International .Bangkok</h5>
                                </div>
                                <div class="row-sm">
                                    <a href=""><h5 class="speciality text-blue">Booked now</h5></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Doctor Widget -->
                    
                    <!-- Doctor Widget -->
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="" class="btn btn-sm btn-white m-1" style="z-index: 1; position: absolute;">230 mts</a>
                            <a href="doctor-profile.html">
                                <img class="img-fluid" style="height: 180px;" alt="User Image" src="{{URL::asset('assets/images/resta/28969287.jpg') }}">
                            </a>
                            <a href="javascript:void(0)" class="fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                        </div>
                        <div class="pro-content">
                            <div class="pro-content">
                                <h4 class="">Flavors Grill</h4>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(52) reviews</span>
                                </div>
                                <div class="row-sm">
                                    <h5 class="speciality">Grill .Abu Dhabi</h5>
                                </div>
                                <div class="row-sm">
                                    <h5 class="speciality">Booked now</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Doctor Widget -->
                    
                    <!-- Doctor Widget -->
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="" class="btn btn-sm btn-white m-1" style="z-index: 1; position: absolute;">230 mts</a>
                            <a href="doctor-profile.html">
                                <img class="img-fluid" style="height: 180px;" alt="User Image" src="{{URL::asset('assets/images/resta/3.jpg') }}">
                            </a>
                            <a href="javascript:void(0)" class="fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                        </div>
                        <div class="pro-content">
                            <div class="pro-content">
                                <h4 class="">Lusin Diyafa Plaza</h4>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(22) reviews</span>
                                </div>
                                <div class="row-sm">
                                    <h5 class="speciality">Middle Eastern .Riyadh</h5>
                                </div>
                                <div class="row-sm">
                                    <a href=""><h5 class="speciality text-blue">Booked now</h5></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Doctor Widget -->
                    
                    <!-- Doctor Widget -->
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="" class="btn btn-sm btn-white m-1" style="z-index: 1; position: absolute;">230 mts</a>
                            <a href="doctor-profile.html">
                                <img class="img-fluid" style="height: 180px;" alt="User Image" src="{{URL::asset('assets/images/resta/28969287.jpg') }}">
                            </a>
                            <a href="javascript:void(0)" class="fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                        </div>
                        <div class="pro-content">
                            <div class="pro-content">
                                <h4 class="">Flavors Grill</h4>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(52) reviews</span>
                                </div>
                                <div class="row-sm">
                                    <h5 class="speciality">Grill .Abu Dhabi</h5>
                                </div>
                                <div class="row-sm">
                                    <h5 class="speciality">Booked now</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Doctor Widget -->

                   </div>
                </div>
            </div>
            
            

            <div class="col-lg-12 my-5" style="padding-top: 100px;">
                <div class="container">
                    <div class="section-header n2 border-bottom">
                        <h3>Popular restaurants</h3>
                    </div>
                    <center>
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <div class="doc-img" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://res.cloudinary.com/tf-lab/image/upload/w_656,h_368,c_fill,g_auto:subject,q_auto,f_auto/restaurant/f4170730-814b-412d-94f0-125b2a4f4dd0/039f6a74-4490-4245-b592-6537792aa268.jpg'); height: 180px;">
                                <a href="doctor-profile.html">
                                    <h5 class="text-white text-uppercase" style="padding:80px;">Japanese food<br/>2200</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="doc-img" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('data:image/jpeg;base64,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'); height: 180px;">
                                <a href="doctor-profile.html">
                                    <h5 class="text-white text-uppercase" style="padding:80px;">Spanish food<br/>6500</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="doc-img" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://i.ndtvimg.com/i/2015-12/italian_625x350_41450863014.jpg'); height: 180px;">
                                <a href="doctor-profile.html">
                                    <h5 class="text-white text-uppercase" style="padding:80px;">Italian food<br/>1200</h5>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-2">
                            <div class="doc-img" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://media-cdn.tripadvisor.com/media/photo-s/16/02/76/87/mix-foods.jpg'); height: 180px;">
                                <a href="doctor-profile.html">
                                    <h5 class="text-white text-uppercase" style="padding:80px;">International foods<br/>13200</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="doc-img" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://www.renalandurologynews.com/wp-content/uploads/sites/22/2019/01/aggressiveprostatecancerdie_964854-860x573.jpg'); height: 180px;">
                                <a href="doctor-profile.html">
                                    <h5 class="text-white text-uppercase" style="padding:80px;">Grill Foods<br/>1900</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="doc-img" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('data:image/jpeg;base64,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'); height: 180px;">
                                <a href="doctor-profile.html">
                                    <h5 class="text-white text-uppercase" style="padding:80px;">Indian Foods<br/>3800</h5>
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

            <div class="container my-5" style="padding-top: 130px;">
            <div class="col-lg-12" style="background: url('{{URL::asset('assets/images/header-bg.png')}}'); height:280px; background-size: cover;">
                <div style="padding-top: 10%;">
                        <center>
                            <h3 class="text-white">Restaurateurs Join Us</h3>
                            <button class="btn btn-danger radius-0 text-white">Learn more</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Popular Section -->
@endsection