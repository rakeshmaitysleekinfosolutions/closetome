<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
	<link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}" />
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
	<link href="{{ URL::asset('assets/css/import.css') }}" rel="stylesheet" type="text/css" />
	@isset($data)
	<link href="{{ URL::asset($data) }}" rel="stylesheet" type="text/css" />
	@endisset
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body class="bg-light">


	<div style="box-shadow: 2px 2px 12px lightblue;">
		@include('includes.navbar')
	</div>
	<div class="bussiness-form container mb-50 mt-80">
		<h2 class="offset-md-1 mt-5 mb-40">{{trans('sentence.signup.createYourBusinessAccount')}} </h2>
		<div class="row justify-content-center mt-5 mb-5">
			<div class="col-md-10 main-shadwo ">
				<span class="text-danger"></span>
				<br>
				<span class="text-danger"></span>
				<form id="registrationFrm" method="post" action="{{ route('bus/signup_submit') }}">
					@csrf
					<div class="row register-form m-5">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{trans('sentence.signup.firstName')}}<span class="text-danger">*</span></label>
								<input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required />
								@error('firstname')
								<span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{trans('sentence.signup.lastName')}}<span class="text-danger">*</span></label>
								<input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required />
								@error('lastname')
								<span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{trans('sentence.signup.password')}}<span class="text-danger">*</span></label>
								<input id="input-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required />
								@error('password')
								<span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{trans('sentence.signup.confirmPassword')}}<span class="text-danger">*</span></label>
								<input type="password" class="form-control @error('cnfmpassword') is-invalid @enderror" name="cnfmpassword" value="{{ old('cnfmpassword') }}" required />
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
								<label for="">{{trans('sentence.signup.email')}}<span class="text-danger">*</span></label>
								<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required />
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
								<label for="">{{trans('sentence.signup.phone')}}<span class="text-danger">*</span></label>
								<input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" required />
								@error('mobile')
								<span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{trans('sentence.signup.country')}}<span class="text-danger">*</span></label>
								<select class="form-control @error('country') is-invalid @enderror" name="country" required>
									<option value="">{{trans('sentence.signup.selectOption')}}</option>
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
								<label for="">{{trans('sentence.signup.city')}}<span class="text-danger">*</span></label>
								<input type="text" name="city" class="form-control" value="" required />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{trans('sentence.signup.street')}}<span class="text-danger">*</span></label>
								<input type="text" name="street" class="form-control" value="" required />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{trans('sentence.signup.streetNumber')}}<span class="text-danger">*</span></label>
								<input type="text" name="street_number" class="form-control" value="" required />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{trans('sentence.signup.postalCode')}}<span class="text-danger">*</span></label>
								<input type="text" name="postal_code" class="form-control" value="" required />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{trans('sentence.signup.companyName')}}<span class="text-danger">*</span></label>
								<input type="text" name="businessname" class="form-control @error('businessname') is-invalid @enderror" value="{{ old('businessname') }}" required />
								@error('businessname')
								<span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{trans('sentence.signup.companyType')}}<span class="text-danger">*</span></label>
								<select class="form-control" name="business_type" required>
									<option value="">{{trans('sentence.signup.selectOption')}}</option>
									@if(count($businessTypes))
                                        @foreach($businessTypes as $businessType)
                                            <option value="{!! $businessType['business_type_id'] !!}">{!! $businessType['spanish_translation'] !!}</option>
                                        @endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">{{trans('sentence.signup.category')}}<span class="text-danger">*</span></label>
								<select class=" form-control" name="category" required>
									<option value="">{{trans('sentence.signup.selectOption')}}</option>

								</select>
							</div>
						</div>
						<div class="col-md-6" id="SubCategoryOption">
							<div class="form-group">
								<label for="">{{trans('sentence.signup.subcategory')}}<span class="text-danger">*</span></label>
								<select class=" form-control" name="subcategory">
									<option value="">{{trans('sentence.signup.selectOption')}}</option>
								</select>
							</div>
						</div>



{{--                        <option value="1">{{ trans('sentence.shops') }}</option>--}}
{{--                        <option value="2">{{ trans('sentence.restaurants') }}</option>--}}
						<!--   <div class="col-md-12">
                            <div>Select your location for finding near</div>
                            <div id="map" style="height:250px;"></div>
                        </div> -->

							<!-- 			<div class="col-md-12 h5">
								<div class="form-check">
	<input required type="checkbox" class="form-check-input" name="confirmed">{{trans('sentence.signup.iConfirmed')}} <a href="" class="text-info">{{trans('sentence.footer.termsAndConditions')}}</a>
		@error('confirmed')
								<span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
								@enderror

								</div>
									<div class="form-check">
	<input required type="checkbox" class="form-check-input text-info" name="acceptcheckbox">{{trans('sentence.signup.iAccept')}}
		@error('acceptcheckbox')
								<span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
								@enderror
								</div>

							</div>  -->

							<div class="col-md-12 h5">
								<div class="form-group">
                                    <div class="form-check">
{{--                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>--}}
                                        <input required type="checkbox" class="form-check-input" name="confirmed">
                                        <label class="form-check-label" for="defaultCheck1">
                                            {{trans('sentence.signup.iConfirmed')}} <a href="" class="text-info">{{trans('sentence.footer.termsAndConditions')}}</a>
                                        </label>
                                    </div>
                                    @error('confirmed')
                                        <span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
                                    @enderror

								</div>
								<div class="form-group">
                                    <div class="form-check">
{{--                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" required>--}}
                                        <input required type="checkbox" class="checkbox" name="acceptcheckbox">
                                        <label class="form-check-label" for="defaultCheck2">
                                            {{trans('sentence.signup.iAccept')}}
                                        </label>

                                    </div>
                                    @error('acceptcheckbox')
                                        <span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
                                    @enderror

							    </div>
							</div>

								<div class="col-md-4 mt-5">
									<div class="reg-button">
										<input type="submit" class="btn takfua-back btn-block radius-0 main-shadwo text-white" name="btnregister" value="{{trans('sentence.signup.registerNow')}}" />
									</div>
								</div>
								<div class="col-md-5 mt-5">
									<div class="reg-button">
										<a class="btn takfua-back btn-block radius-0 main-shadwo text-white" href="{{ route('bus/signin') }}">{{trans('sentence.signup.alreadyHaveAccount')}}</a>
									</div>
								</div>



						<br />
					</div>
				</form>
			</div>
		</div>

	</div>
<script>
        var myLabel                 = myLabel || {};
        myLabel.token               = '{{Session::token()}}'
        myLabel.parentCategory      = '{{route('fetch-categories')}}';
        myLabel.childCategory       = '{{route('fetch-subcategories')}}';
        myLabel.businessTypeParentCategory       = '';
        myLabel.businessTypeChildCategory       = '';
        myLabel.selectOption       = '{{ trans('sentence.business.store.label.selectOption') }}';

    </script>

	@include('includes/footer')
