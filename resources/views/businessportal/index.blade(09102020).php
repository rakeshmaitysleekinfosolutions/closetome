@extends('businessportal.layouts.master')
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
                    <form id="frm" action="{{route('update-store')}}" method="post" enctype="multipart/form-data">
                        @if(session()->has('message'))
                            <p class="alert {{ session()->get('alert-class', 'alert-info') }}">{{ session()->get('message') }}</p>
                        @endif
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
                                        <h4 class="card-title">{{ trans('sentence.business.store.label.businessDetails') }}</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.companyName') }}<span class="text-danger">*</span></label>
                                                    <input type="text" required name="business_name" class="form-control" value="{{$businessUserInfo['business_name']}}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.businessDescription') }}<span class="text-danger">*</span></label>
                                                    <textarea name="business_description" cols="5" rows="5" class="form-control" required>{{$businessUserInfo['business_description']}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.phone') }}<span class="text-danger">*</span></label>
                                                    <input type="text" required name="phone" class="form-control" value="{{$businessUserInfo['phone']}}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.email') }}<span class="text-danger">*</span></label>
                                                    <input type="text" required name="email" class="form-control" value="{{$businessUserInfo['raw_email']}}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.companyType') }}<span class="text-danger">*</span></label>
                                                    <select class="form-control" required name="business_type">
                                                        <option>{{ trans('sentence.business.store.label.selectOption') }}</option>
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
                                                    <label for="">{{ trans('sentence.business.store.label.category') }}<span class="text-danger">*</span></label>
                                                    <select class="form-control" required name="category">
                                                        <option value="">{{ trans('sentence.business.store.label.selectOption') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.subcategory') }}<span class="text-danger">*</span></label>
                                                    <select class="form-control" name="subcategory">
                                                        <option value="">{{ trans('sentence.business.store.label.selectOption') }}</option>
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
                                        <h4 class="card-title">{{ trans('sentence.business.store.label.manageAddress') }}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.country') }}</label>
                                                    <select class="form-control @error('country') is-invalid @enderror" name="country">
                                                        <option value="">{{trans('sentence.signup.selectOption')}}</option>
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
                                                    <label for="">{{ trans('sentence.business.store.label.city') }}<span class="text-danger">*</span></label>
                                                    <input type="text" name="city" class="form-control" value="{{$businessUserInfo['city']}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.street') }}<span class="text-danger">*</span></label>
                                                    <input type="text" name="street" class="form-control" value="{{$businessUserInfo['street']}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.streetNumber') }}<span class="text-danger">*</span></label>
                                                    <input type="text" name="street_number" class="form-control" value="{{$businessUserInfo['street_number']}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.postCode') }}<span class="text-danger">*</span></label>
                                                    <input type="text" name="postal_code" class="form-control" value="{{$businessUserInfo['postal_code']}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card bg-white" style="margin-top: 0px !important;padding:0">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ trans('sentence.business.store.label.managePassword') }}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.password') }}</label>
                                                    <input type="password" name="password" id="input-password" class="form-control" value="" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.store.label.confirmPassword') }}</label>
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
                                    <img width="100%" height="500px;" src="{{ isset($businessUserInfo['shop_icon']) ? asset('assets/images/vendors/'.$businessUserInfo['shop_icon']) : URL::asset('assets/images/placeholder.png') }}" src="" alt=""/>
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
    myLabel.parentCategory      = '{{route('fetch-categories')}}';
    myLabel.childCategory       = '{{route('fetch-subcategories')}}';
    myLabel.businessTypeParentCategory       = '{{ $businessUserInfo['category'] }}';
    myLabel.businessTypeChildCategory       = '{{ $businessUserInfo['subcategory'] }}';
    myLabel.selectOption       = '{{ trans('sentence.business.store.label.selectOption') }}';

</script>
