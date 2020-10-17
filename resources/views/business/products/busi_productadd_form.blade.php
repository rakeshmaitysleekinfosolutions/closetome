
@extends('layouts.seller')
@section('content')
    <div class="col-md-10 col-sm-10">
        <div class="row">
            <div class="col-md-12 col-sm-12 bg-white main-shadwo">

                <div class="enter-conta">
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <a href="{{route('bus/products') }}" class="btn takfua-back text-white">{{ trans('sentence.business.product.label.back') }}</a>
                        <h3 class="mt-2">{{ trans('sentence.business.product.label.addProduct') }}</h3>
                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="card bg-white" style="margin-top: 0px !important;padding:0">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ trans('sentence.business.product.label.productDetails') }}</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.business.product.label.category') }}</label>
                                                    <select name="category_id" id="category_id" class="form-control" required>
                                                        <option value="">{{ trans('sentence.business.product.label.selectOne') }}</option>
                                                        @foreach ($categories as $item)
                                                            <option value="{{$item->spanish_translation}}">{{$item->spanish_translation}}</option>
                                                        @endforeach
                                                    </select>
                                                    {{-- <input type="text" class="form-control" value="{{ $product_detail->category_name }}"> --}}
                                                </div>
                                                {{-- <p></p> --}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">{{ trans('sentence.business.product.label.subCategory') }}</label>
                                                <select name="subcategory_id" required id="dyn_subcats" class="form-control" required>
                                                </select>
                                                {{-- <input type="text" class="form-control" value="{{ $product_detail->subcategory_name }}"> --}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">{{ trans('sentence.business.product.label.price') }}</label>
                                                <input type="number" required  name="product_price" required class="form-control" value="">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">{{ trans('sentence.business.product.label.productBrand') }}</label>
                                                <input type="text"  required name="product_brand" required class="form-control" value="">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">{{ trans('sentence.business.product.label.name') }}</label>
                                                <input type="text"  required name="product_name" required class="form-control" value="">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">{{ trans('sentence.business.product.label.quantity') }}</label>
                                                <input type="number" required name="product_quantity" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card bg-white" style="margin-top: 0px !important;padding:0">
                                    <div class="card-body">
                                        <label for="">{{ trans('sentence.business.product.label.productDescription') }}</label>
                                        <textarea name="product_description" id="" cols="5" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card bg-white" style="margin-top: 0px !important;padding:0">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title">{{ trans('sentence.business.product.label.productColors') }}</h4>
                                        <label for="">{{ trans('sentence.business.product.label.addColors') }}</label>

                                        <div id="dyn_colors">
                                        </div>
                                        <button class="btn takfua-back text-white" id="addcolor" type="button">{{ trans('sentence.business.product.button.add') }}</button>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="card-title">{{ trans('sentence.business.product.label.productSizes') }}</h4>
                                        <label for="">{{ trans('sentence.business.product.label.addSizes') }}</label>

                                        <div id="dyn_sizes">
                                        </div>
                                        <button class="btn takfua-back text-white" id="addsize" type="button">{{ trans('sentence.business.product.button.add') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        /*
                        <div class="card bg-white" style="margin-top: 0px !important;padding:0">
                            <div class="card-body">
                                <h4 class="card-title">{{ trans('sentence.business.product.label.productImages') }}</h4>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">{{ trans('sentence.business.product.label.addImage') }}</label>
                                            <input type="file" name="file1" class="form-control"  accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">{{ trans('sentence.business.product.label.addImage') }}</label>
                                            <input type="file" name="file2" class="form-control"  accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">{{ trans('sentence.business.product.label.addImage') }}</label>
                                            <input type="file" name="file3" class="form-control"  accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">{{ trans('sentence.business.product.label.addImage') }}</label>
                                            <input type="file" name="file4" class="form-control"  accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">{{ trans('sentence.business.product.label.addImage') }}</label>
                                            <input type="file" name="file5" class="form-control"  accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">{{ trans('sentence.business.product.label.addImage') }}</label>
                                            <input type="file" name="file6" class="form-control"  accept="image/*">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        */?>
                        <div class="table-responsive">
                            <table id="images" class="table table-striped table-bordered table-hover">
                                <thead>
                                <th colspan="3">
                                    {{ trans('sentence.restaurant.menu.label.images') }}
                                </th>
                                <tr>
                                    <td class="text-left">{{ trans('sentence.restaurant.menu.label.image') }}</td>
                                    <td>{{ trans('sentence.restaurant.menu.label.uploadImage') }}</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $imageRow = 0;
                                @endphp
                                @if(count($images))
                                    @foreach($images as $image)
                                        <tr id="image-row{{$imageRow}}">
                                            <td class="text-left">
                                                <img src="{{$image['thumb']}}" alt="" title="" />
                                                <input type="hidden" name="images[{{ $imageRow}}][old_images]" value="{{$image['thumb']}}" id="input-image{{ $imageRow}}"/>
                                            </td>
                                            <td>
                                                <input type="file" name="images[{{ $imageRow}}][image]" class="form-control">
                                            </td>
                                            <td class="text-left"><button type="button" data-url="{{route('dish.delete.image', [$id])}}" data-row="{{$imageRow}}" data-id="{{$image['id']}}" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                                        </tr>
                                        @php
                                            $imageRow++;
                                        @endphp
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="3"></td>
                                    <td class="text-left"><button type="button" data-toggle="tooltip" title="Add" class="btn btn-primary addImage"><i class="fa fa-plus-circle"></i></button></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        <br>
                        <div style="display: flex;justify-content: flex-end">
                            <button class="btn takfua-back text-white"><i class="fas fa-save"></i>&nbsp;{{ trans('sentence.restaurant.menu.button.save') }}</button>&nbsp;
                            <a href="{{$back}}" class="btn btn-primary rounded"><i class="fa fa-arrow-alt-circle-left"></i> {{ trans('sentence.restaurant.menu.link.back') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var myLabel                 = myLabel || {};
        myLabel.token               = '{{Session::token()}}'
        myLabel.parentCategory      = '{{route('fetch-categories')}}';
        myLabel.childCategory       = '{{route('fetch-subcategories')}}';
        myLabel.businessTypeParentCategory       = '{{ $businessUserInfo['category'] }}';
        myLabel.businessTypeChildCategory       = '{{ $businessUserInfo['subcategory'] }}';
        myLabel.selectOption       = '{{ trans('sentence.business.store.label.selectOption') }}';
        myLabel.imageRow        = '{{$imageRow}}';
        myLabel.placeholder     = '{{$placeholder}}';

    </script>
@endpush

