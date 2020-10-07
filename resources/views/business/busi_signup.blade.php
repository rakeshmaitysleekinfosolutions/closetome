<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
		<script src="{{URL::asset('leaflet/leaflet-src.js')}}"></script>
		<link rel="stylesheet" href="{{URL::asset('leaflet/leaflet.css')}}" />

        <!-- Favicons -->
        <!--<link type="image/x-icon" href="assets/img/logo-tab.png" rel="icon">-->
        <!-- Bootstrap CSS -->
        <title>{{ trans('sentence.footer.closeToMe') }}</title>
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
        @isset($data)
            <link href="{{ URL::asset($data) }}" rel="stylesheet" type="text/css"/>            
        @endisset    
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    </head>
        <body class="bg-light">


    <div style="box-shadow: 2px 2px 12px lightblue;">
        @include('includes.navbar')
    </div>
    <div class="container mb-50 mt-80">
        <h2 class="offset-md-1 mt-5 mb-40">{{trans('sentence.signup.createYourBusinessAccount')}} </h2>
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-10 main-shadwo ">
                <span class="text-danger"></span>
                <br>
				<span class="text-danger"></span>
                <form method="post" action="{{ route('bus/signup_submit') }}">
                    @csrf
                    <div class="row register-form m-5">
                        <div class="col-md-6">
                            <div class="form-group">
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="{{trans('sentence.signup.firstName')}} *" name="firstname" value="{{ old('firstname') }}" />
                                @error('firstname')
                                <span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="{{trans('sentence.signup.lastName')}} *" name="lastname" value="{{ old('lastname') }}" />
                                @error('lastname')
                                <span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{trans('sentence.signup.password')}} *" name="password" value="{{ old('password') }}" />
                                @error('password')
                                <span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control @error('cnfmpassword') is-invalid @enderror"  placeholder="{{trans('sentence.signup.confirmPassword')}} *" name="cnfmpassword" value="{{ old('cnfmpassword') }}" />
                                @error('cnfmpassword')
                                <span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
                                @enderror

                                @if(session()->has('cpass_msg'))
                                <span class="text-danger"><i class="fas fa-info-circle"></i> {{session()->get('cpass_msg')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{trans('sentence.signup.yourEmail')}} *" name="email" value="{{ old('email') }}" />
                                @error('email')
                                <span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
                                @enderror

                                @if(session()->has('email_msg'))
                                <span class="text-danger"><i class="fas fa-info-circle"></i> {{session()->get('email_msg')}}</span>
                                @endif
    
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="{{trans('sentence.signup.yourPhone')}} *" value="{{ old('mobile') }}" />
                                @error('mobile')
                                <span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control @error('country') is-invalid @enderror" name="country">
                                    <option value="">{{trans('sentence.signup.selectCountry')}}</option>
                                    <option value="Spain">{{trans('sentence.signup.spain')}}</option>
                                    <option value="United Kingdom">{{trans('sentence.signup.unitedKingdom')}}</option>
                                 </select>  
                                 @error('country')
                                 <span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
                                 @enderror

                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="{{trans('sentence.signup.enterYourCity')}}*" value="" />
                            </div>
                        </div>                           
                         <div class="col-md-6">
                                    <div class="form-group">
                                <input type="text" name="street" class="form-control" placeholder="{{trans('sentence.signup.enterYourStreetNumber')}}*" value="" />
                            </div>
                         </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                <input type="text" name="postal_code" class="form-control" placeholder="{{trans('sentence.signup.enterYourPostalCode')}}*" value="" />
                            </div>  

                              </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="businessname" class="form-control @error('businessname') is-invalid @enderror" placeholder="{{trans('sentence.signup.enterYourBusinessName')}}*" value="{{ old('businessname') }}" />
                                @error('businessname')
                                <span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="business_type" onchange="getAjaxCategory(this.value)">
                                    <option value="">Select Business Type</option>
                                    <option value="1">{{ trans('sentence.shops') }}</option>
                                    <option value="2">{{ trans('sentence.restaurants') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class=" form-control" name="shopcategory" onchange="getSubcats(this.value)">
                                    <option value="">{{trans('sentence.signup.selectShopCategory')}}</option>
                                    @foreach ($categories as $sc)
                                    <option value="{{$sc->category_id}}">{{$sc->spanish_translation}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
<!--                         <div class="col-md-6">
                            <div class="form-group">
                                <select class=" form-control" name="sub_category" id="sub_category">
                                    <option value="">Select Sub-category</option>
                                </select>
                            </div>
                        </div>
 -->
 
                              </div>
                                               
                      <!--   <div class="col-md-12">
                            <div>Select your location for finding near</div>
                            <div id="map" style="height:250px;"></div>
                        </div> -->
                        <div style=" margin-left: 20px;">
                            <div class="col-md-12 h5">
                                <input type="checkbox" class="form-check-input" name="confirmed">{{trans('sentence.signup.iConfirmed')}} <a href="" class="text-info">{{trans('sentence.footer.termsAndConditions')}}</a><br/>
                                <input type="checkbox" class="form-check-input text-info" name="acceptcheckbox">{{trans('sentence.signup.iAccept')}}
                                <br/>
                                @error('confirmed')
                                <span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
                                @enderror
                                <br/>
                                @error('acceptcheckbox')
                                <span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
                                @enderror

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                            <div class="mt-4">
                                <input type="submit" class="btn takfua-back btn-block radius-0 main-shadwo text-white" name="btnregister"  value="{{trans('sentence.signup.registerNow')}}"/>
                            </div>                                    
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                            <div class="mt-1">
                                <a class="btn takfua-back btn-block radius-0 main-shadwo text-white"  href="{{ route('bus/signin') }}">{{trans('sentence.signup.alreadyHaveAccount')}}</a>
                            </div>                                    
                                </div>
                            </div>
                        </div>
                        <br/>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script>
    function getSubcats(category_id){
        if(category_id!=''){
            var url=`https://siswork.com/dev/closetome/bus/ajaxSubCats`;
        $.post(url,
        {
            category_id:category_id,
            _token : '<?php echo csrf_token() ?>'
        }
        ,(data,status)=>{
            var obj = JSON.parse(data);
            var htmlstr = '';
            obj.subcats.map((cur)=>{
                htmlstr+=`<option value="${cur.subcategory_id}">${cur.subcategory_name}</option>`;
                // console.log(cur.subcategory_name);
            });
            $("#sub_category").html(htmlstr);
        });
        }
    }
</script>
    @include('includes/footer')