@extends('restaurantportal.layouts.master')
@section('content')
    <div class="col-md-10 col-sm-12">
        <form id="frm" action="{{$action}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="mode" value="{{$businessUserInfo['mode']}}">
            <input type="hidden" name="id" value="{{$businessUserInfo['id']}}">
        <div class="">
            <div class="col-md-12 col-sm-12 bg-white main-shadwo">
                <div class="row bg-header border-bottom">
                    <div class="col-md-12 col-sm-12">
                        <div class="navbar-nav my-4 margin-25">
                            <div class="h3">{{ trans('sentence.restaurant.store.label.manageStore') }}</div>
                            <div style="display: flex;justify-content: flex-end">
                                <button class="btn takfua-back text-white"><i class="fas fa-save"></i>&nbsp;{{ trans('sentence.restaurant.menu.button.save') }}</button>&nbsp;
                                <a href="{{$back}}" class="btn btn-primary rounded"><i class="fa fa-arrow-alt-circle-left"></i> {{ trans('sentence.restaurant.menu.link.back') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="enter-conta">

                        @if(session()->has('message'))
                            <p class="alert {{ session()->get('alert-class', 'alert-info') }}">{{ session()->get('message') }}</p>
                        @endif
                        <div class="row">
                            @if (isset($status))
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        {{ trans('sentence.restaurant.store.label.updateMessage') }}
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12">
                                <div class="card bg-white" style="margin-top: 0px !important;padding:0">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ trans('sentence.restaurant.store.label.businessDetails') }}</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.store.label.companyName') }}<span class="text-danger">*</span></label>
                                                    <input type="text" required name="business_name" class="form-control" value="{{$businessUserInfo['business_name']}}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.store.label.businessDescription') }}<span class="text-danger">*</span></label>
                                                    <textarea name="business_description" cols="5" rows="5" class="form-control" required>{{$businessUserInfo['business_description']}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.store.label.phone') }}<span class="text-danger">*</span></label>
                                                    <input type="text" required name="phone" class="form-control" value="{{$businessUserInfo['phone']}}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.store.label.email') }}<span class="text-danger">*</span></label>
                                                    <input type="text" required name="email" class="form-control" value="{{$businessUserInfo['raw_email']}}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.store.label.companyType') }}<span class="text-danger">*</span></label>
                                                    <select class="form-control" required name="business_type">
                                                        <option>{{ trans('sentence.restaurant.store.label.selectOption') }}</option>
                                                        @if(count($businessTypes))
                                                            @foreach($businessTypes as $businessType)
                                                                <option {{ $businessUserInfo['business_type'] == $businessType['business_type_name'] ? 'selected' : ''}} value="{!! $businessType['business_type_id'] !!}">{!! $businessType['business_type_name'] !!}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.store.label.category') }}<span class="text-danger">*</span></label>
                                                    <select class="form-control" required name="category">
                                                        <option value="">{{ trans('sentence.restaurant.store.label.selectOption') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="display: none;">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.store.label.subcategory') }}<span class="text-danger">*</span></label>
                                                    <select class="form-control" name="subcategory">
                                                        <option value="">{{ trans('sentence.restaurant.store.label.selectOption') }}</option>
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
                                        <h4 class="card-title">{{ trans('sentence.restaurant.store.label.manageAddress') }}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.store.label.country') }}</label>
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
                                                    <label for="">{{ trans('sentence.restaurant.store.label.city') }}<span class="text-danger">*</span></label>
                                                    <input type="text" name="city" class="form-control" value="{{$businessUserInfo['city']}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.store.label.street') }}<span class="text-danger">*</span></label>
                                                    <input type="text" name="street" class="form-control" value="{{$businessUserInfo['street']}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.store.label.streetNumber') }}<span class="text-danger">*</span></label>
                                                    <input type="text" name="street_number" class="form-control" value="{{$businessUserInfo['street_number']}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.store.label.postCode') }}<span class="text-danger">*</span></label>
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
                                        <h4 class="card-title">{{ trans('sentence.restaurant.store.label.managePassword') }}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.store.label.password') }}</label>
                                                    <input type="password" name="password" id="input-password" class="form-control" value="" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.store.label.confirmPassword') }}</label>
                                                    <input type="password" name="confirmed" class="form-control" value="" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--                             <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">{{ trans('sentence.restaurant.store.label.shopImage') }} &nbsp;<span class="text-danger">({{ trans('sentence.restaurant.store.label.preferableSize') }} : 1200 X 398)</span></label>
                                    <img width="100%" height="500px;" src="{{ isset($businessUserInfo['shop_image']) ? URL::asset('assets/images/vendors/'.$businessUserInfo['shop_image']) : URL::asset('assets/images/placeholder.png') }}" alt=""/>
                                    <br><br/>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">{{ trans('sentence.restaurant.store.label.uploadNew') }}</label>
                                            <input type="file" name="shop_image" class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
 -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <td class="text-left">{{trans('sentence.restaurant.store.label.shopImage')}}</td>
                                                <td class="text-left">{{trans('sentence.restaurant.store.label.upload')}}</td>
                                            </tr>

                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="text-left">
                                                    <a href="javascript:void(0);"  type="image" id="thumb-image" data-toggle="image">
                                                        <img src="{{$businessUserInfo['thumb']}}" alt="" title="" data-placeholder="{{$businessUserInfo['placeholder']}}"/>
                                                    </a>
                                                    <input type="hidden" name="image_id" value="{{$businessUserInfo['image_id']}}"/>
                                                </td>
                                                <td class="">
                                                    <input type="file" class="form-control" name="shop_icon" value="{{$businessUserInfo['shop_icon']}}" id="input-image"/>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>


                        @csrf

                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
<script>
    var myLabel                 = myLabel || {};
    myLabel.token               = '{{Session::token()}}'
    myLabel.parentCategory      = '{{route('fetch-categories')}}';
    myLabel.childCategory       = '{{route('fetch-subcategories')}}';
    myLabel.businessTypeParentCategory       = '{{ $businessUserInfo['category'] }}';
    myLabel.businessTypeChildCategory       = '{{ $businessUserInfo['subcategory'] }}';
    myLabel.selectOption       = '{{ trans('sentence.restaurant.store.label.selectOption') }}';

</script>
