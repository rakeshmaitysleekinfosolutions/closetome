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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ trans('sentence.business.store.label.businessName') }}</label>
                                                <input type="text" required name="business_name" class="form-control" value="{{ $vendor->business_name }}">
                                            </div>
                                        </div>
<!--                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Shop Address</label>
                                                <input type="text" required name="business_name" class="form-control" value="{{ $vendor->business_name }}">
                                            </div>
                                        </div>
 -->                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ trans('sentence.business.store.label.shopTelephone') }}</label>
                                                <input type="text" required name="phone" class="form-control" value="{{ $vendor->phone }}">
                                            </div>
                                        </div>
<!--                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Shop Owner name</label>
                                                <input type="text" required name="business_name" class="form-control" value="{{ $vendor->business_name }}">
                                            </div>
                                        </div>
 -->                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ trans('sentence.business.store.label.shopOwnerEmail') }}</label>
                                                <input type="text" required name="raw_email" class="form-control" value="{{ $vendor->raw_email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ trans('sentence.business.store.label.password') }}</label>
                                                <input type="text" required name="password" class="form-control" value="{{ $vendor->raw_password }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ trans('sentence.business.store.label.category') }}</label>
                                                <select class="form-control" required name="shopcat">
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ trans('sentence.business.store.label.subCategory') }}</label>
                                                <select class="form-control" required name="shopcat">
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

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">{{ trans('sentence.business.store.label.businessDescription') }}</label>
                                                <textarea name="business_description" cols="5" rows="5" class="form-control" required>
                                                    {{ $vendor->business_description }}
                                                </textarea>
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