@extends('businessportal::layouts.master')
@section('content')
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
                    <form id="frm" action="{{route('update')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="vendor_id" value="{{ $businessUserInfo['vendor_id'] }}">
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
                                                    <input type="text" required name="business_name" class="form-control" value="{{$businessUserInfo['business_name']}}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.businessDescription') }}</label>
                                                    <textarea name="business_description" cols="5" rows="5" class="form-control" required>{{$businessUserInfo['business_description']}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.shopTelephone') }}</label>
                                                    <input type="text" required name="phone" class="form-control" value="{{$businessUserInfo['phone']}}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.shopOwnerEmail') }}</label>
                                                    <input type="text" required name="email" class="form-control" value="{{$businessUserInfo['raw_email']}}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.businessType') }}</label>
                                                    <select class="form-control" required name="businessType">
                                                        <option>select option</option>
                                                        @if(count($businessTypes))
                                                            @foreach($businessTypes as $businessType)
                                                                <option {{ $businessUserInfo['business_type'] == $businessType['business_type_name'] ? 'selected' : ''}} value="{!! $businessType['business_type_id'] !!}">{!! $businessType['business_type_name'] !!}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.category') }}</label>
                                                    <select class="form-control" required name="businessTypeParentCategory">
                                                        <option value="">select option</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.category') }}</label>
                                                    <select class="form-control" name="businessTypeChildCategory">
                                                        <option value="">select option</option>
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
                                                        <option {{ $businessUserInfo['country'] == 'Spain' ? 'selected' : ''}} value="Spain">{{trans('sentence.signup.spain')}}</option>
                                                        <option {{ $businessUserInfo['country'] == 'United Kingdom' ? 'selected' : ''}} value="United Kingdom">{{trans('sentence.signup.unitedKingdom')}}</option>
                                                    </select>
                                                    @error('country')
                                                    <span class="text-danger"><i class="fas fa-info-circle"></i> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.city') }}</label>
                                                    <input type="text" name="city" class="form-control" placeholder="{{trans('sentence.signup.enterYourCity')}}*" value="{{$businessUserInfo['city']}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.street') }}</label>
                                                    <input type="text" name="street" class="form-control" placeholder="{{trans('sentence.signup.enterYourStreetNumber')}}*" value="{{$businessUserInfo['street']}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.postCode') }}</label>
                                                    <input type="text" name="postal_code" class="form-control" placeholder="{{trans('sentence.signup.enterYourPostalCode')}}*" value="{{$businessUserInfo['postal_code']}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card bg-white" style="margin-top: 0px !important;padding:0">
                                    <div class="card-body">
                                        <h4 class="card-title">Manage Password</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.password') }}</label>
                                                    <input type="password" name="password" id="input-password" class="form-control" value="" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.password') }}</label>
                                                    <input type="password" name="confirmed" class="form-control" value="" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">{{ trans('sentence.business.store.label.shopImage') }} &nbsp;<span class="text-danger">({{ trans('sentence.business.store.label.preferableSize') }} : 1200 X 398)</span></label>
                                    <img width="100%" height="500px;" src="{{ isset($businessUserInfo['shop_image']) ? URL::asset('assets/images/vendors/'.$businessUserInfo['shop_image']) : URL::asset('assets/images/placeholder.png') }}" alt=""/>
                                    <br><br/>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">{{ trans('sentence.business.store.label.uploadNew') }}</label>
                                            <input type="file" name="shop_image" class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">{{ trans('sentence.business.store.label.coverImage') }} &nbsp;<span class="text-danger">({{ trans('sentence.business.store.label.preferableSize') }} : 1200 X 398)</span></label>
                                    <img width="100%" height="500px;" src="{{ isset($businessUserInfo['coverimage']) ? URL::asset('assets/images/vendors/'.$businessUserInfo['coverimage']) : URL::asset('assets/images/placeholder.png') }}" src="" alt=""/>
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
                                    <img width="100%" height="500px;" src="{{ isset($businessUserInfo['shop_icon']) ? URL::asset('assets/images/vendors/'.$businessUserInfo['shop_icon']) : URL::asset('assets/images/placeholder.png') }}" src="" alt=""/>
                                    <br><br/>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">{{ trans('sentence.business.store.label.uploadNew') }}</label>
                                            <input type="file" name="shop_icon" class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>

                        <div style="display: flex;justify-content: flex-end">
                            <button class="btn btn-primary">{{ trans('sentence.business.store.button.updateStore') }}</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    var myLabel                 = myLabel || {};
    myLabel.token               = '{{Session::token()}}'
    myLabel.parentCategory      = '{{route('parentCategory')}}';
    myLabel.childCategory       = '{{route('childCategory')}}';
    myLabel.businessTypeParentCategory       = '{{ $businessUserInfo['category'] }}';
    myLabel.businessTypeChildCategory       = '{{ $businessUserInfo['subcategory'] }}';

</script>
