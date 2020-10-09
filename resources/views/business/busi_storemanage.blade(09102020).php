@include('includes.header')
<body class="bg-default-light">
        <div class="white shadow">
            <div class="container-fluid">
                <style>
                    .contacv{
                        margin-left: 1%;
                        margin-right: 1%;
                    }
                </style>

                @include('business.busi_header')
            </div>
        </div>

        <div class="container-fluid my-5">
            <div class="margin-25">
                <div class="row">
                    <div class="col-md-2 col-sm-12  d-sm-block">

                        @include('business.bus_sidebar')

                    </div>

                    <div class="col-md-10 col-sm-12">
                        <div class="">
                            <div class="col-md-12 col-sm-12 bg-white main-shadwo">
                                <div class="row bg-header border-bottom">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="navbar-nav my-4 margin-25">
                                            <div class="h3">{{ trans('sentence.business.store.label.manageStore') }}</div>
                                        </div>
                                    </div>

                                </div>

                                <div class="enter-conta">
                                    <form action="{{ route('bus/storeUpdate')}}" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        @if (isset($status))
                                        <div class="col-md-12">
                                            <div class="alert alert-success">
                                                {{ trans('sentence.business.store.label.updateMessage') }}
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-md-12">
                                            <div class="card bg-white" style="margin-top: 0px !important;padding:0">
                                                <div class="card-body">
                                                    <h4 class="card-title">Business Details</h4>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">{{ trans('sentence.business.store.label.businessName') }}</label>
                                                                <input type="text" required name="business_name" class="form-control" value="{{ $vendor->business_name }}" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">{{ trans('sentence.business.store.label.businessDescription') }}</label>
                                                                <textarea name="business_description" cols="5" rows="5" class="form-control" required>{{ $vendor->business_description }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">{{ trans('sentence.business.store.label.shopTelephone') }}</label>
                                                                <input type="text" required name="phone" class="form-control" value="{{ $vendor->phone }}" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">{{ trans('sentence.business.store.label.shopOwnerEmail') }}</label>
                                                                <input type="text" required name="email" class="form-control" value="{{ $vendor->raw_email }}" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">{{ trans('sentence.business.store.label.category') }}</label>
                                                                <select class="form-control" required name="business_type">
                                                                    <option>select option</option>
                                                                    <option value="Shops">Shops</option>
                                                                    <option value="Restaurants">Restaurants</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">{{ trans('sentence.business.store.label.category') }}</label>
                                                                <select class="form-control" required name="sub_category_name">
                                                                    @foreach ($shopcats as $sc)
                                                                        <option value="{{$sc->shop_category_name}}"
                                                                                <?php if($sc->shop_category_name == $vendor->shop_type){
                                                                                ?> selected <?php
                                                                            } ?>
                                                                        >
                                                                            {{$sc->shop_category_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">{{ trans('sentence.business.store.label.category') }}</label>
                                                                <select class="form-control" required name="shop_type">
                                                                    <option value="" >select option</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card bg-white" style="margin-top: 0px !important;padding:0">
                                                <div class="card-body">
                                                    <h4 class="card-title">Manage Address</h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">{{ trans('sentence.business.store.label.country') }}</label>
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
                                                                <label for="">{{ trans('sentence.business.store.label.city') }}</label>
                                                                <input type="text" name="city" class="form-control" placeholder="{{trans('sentence.signup.enterYourCity')}}*" value="" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">{{ trans('sentence.business.store.label.street') }}</label>
                                                                <input type="text" name="street" class="form-control" placeholder="{{trans('sentence.signup.enterYourStreetNumber')}}*" value="" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">{{ trans('sentence.business.store.label.postCode') }}</label>
                                                                <input type="text" name="postal_code" class="form-control" placeholder="{{trans('sentence.signup.enterYourPostalCode')}}*" value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

<!--                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Shop Address</label>
                                                <input type="text" required name="business_name" class="form-control" value="{{ $vendor->business_name }}">
                                            </div>
                                        </div>
 -->
<!--                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Shop Owner name</label>
                                                <input type="text" required name="business_name" class="form-control" value="{{ $vendor->business_name }}">
                                            </div>
                                        </div>
 -->

<!-- Code modified by rakesh-->

<!-- Code modified by rakesh-->

                                            <div class="col-md-12">
                                                <div class="card bg-white" style="margin-top: 0px !important;padding:0">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Manage Password</h4>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">{{ trans('sentence.business.store.label.password') }}</label>
                                                                    <input type="text" required name="password" class="form-control" value="" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">{{ trans('sentence.business.store.label.password') }}</label>
                                                                    <input type="text" required name="password" class="form-control" value="" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">{{ trans('sentence.business.store.label.shopImage') }} &nbsp;<span class="text-danger">({{ trans('sentence.business.store.label.preferableSize') }} : 1200 X 398)</span></label>
                                                <img width="100%" src="{{URL::asset('assets/images/vendors/'.$vendor->shop_image)}}" alt=""/>
                                                <br><br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="">{{ trans('sentence.business.store.label.uploadNew') }}</label>
                                                        <input type="file" name="cover_image" class="form-control" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">{{ trans('sentence.business.store.label.coverImage') }} &nbsp;<span class="text-danger">({{ trans('sentence.business.store.label.preferableSize') }} : 1200 X 398)</span></label>
                                                <img width="100%" src="{{URL::asset('assets/images/vendors/'.$vendor->coverimage)}}" alt=""/>
                                                <br><br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="">{{ trans('sentence.business.store.label.uploadNew') }}</label>
                                                        <input type="file" name="cover_image" class="form-control" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ trans('sentence.business.store.label.shopIcon') }} &nbsp;<span class="text-danger">({{ trans('sentence.business.store.label.preferableSize') }} : 512 X 512)</span></label>
                                                <img width="100%" src="{{URL::asset('assets/images/vendors/'.$vendor->shop_icon)}}" alt=""/>
                                                <br><br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="">{{ trans('sentence.business.store.label.uploadNew') }}</label>
                                                        <input type="file" name="cover_image" class="form-control" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <input type="hidden" name="vendor_id" value="{{$vendor->vendor_id}}">
                                    <div style="display: flex;justify-content: flex-end">
                                        <button class="btn btn-primary">{{ trans('sentence.business.store.button.updateStore') }}</button>
                                    </div>
                                    @csrf
                                </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
        @include('includes.footer')
