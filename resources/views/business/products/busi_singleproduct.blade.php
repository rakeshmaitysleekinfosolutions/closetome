@include('includes.header')
<body class="bg-default-light">
<div class="white shadow">
    <div class="container-fluid">
        @include('business.busi_header')
    </div>
</div>
<style>
    .p_image_box{
        width: 100%;
    border: 1px solid black;
    height: 8em;
    }
</style>
<div class="container-fluid my-5">
    <div class="margin-25">
        <div class="row">
            <div class="col-md-2 col-sm-2  d-sm-block">
                @include('business.bus_sidebar')
            </div>


            <div class="col-md-10 col-sm-10">
                <div class="row">
                    <div class="col-md-12 col-sm-12 bg-white main-shadwo">
                        
                        <div class="enter-conta">
                            <form action="{{route('bus/editproductsubmit')}}" method="post" enctype="multipart/form-data">
                            <a href="{{route('bus/products') }}" class="btn takfua-back text-white">{{ trans('sentence.business.product.label.back') }}</a>
                            <h3 class="mt-2">{{ trans('sentence.business.product.label.editProduct') }}</h3>
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <div class="card bg-white" style="margin-top: 0px !important;padding:0">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ trans('sentence.business.product.label.productDetails') }}</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">{{ trans('sentence.business.product.label.category') }}</label>
                                                        <select name="category_id" id="category_id" class="form-control" onchange="getAjaxSubcategories(this.value)" required>
                                                            <option value="">{{ trans('sentence.business.product.label.selectOne') }}</option>
                                                            @foreach ($categories as $item)
                                                                <option value="{{$item->category_id}}" <?php if($item->category_id == $product_detail->category_id){ echo "selected"; } ?>>{{$item->category_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <input type="text" class="form-control" value="{{ $product_detail->category_name }}"> --}}
                                                    </div>
                                                    {{-- <p></p> --}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">{{ trans('sentence.business.product.label.subCategory') }}</label>
                                                    <select name="subcategory_id" required id="dyn_subcats" class="form-control" required>
                                                        @foreach ($subcats as $item)
                                                        <option value="{{$item->subcategory_id}}" <?php if($item->subcategory_id == $product_detail->subcategory_id){ echo "selected"; } ?>>{{$item->subcategory_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    {{-- <input type="text" class="form-control" value="{{ $product_detail->subcategory_name }}"> --}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">{{ trans('sentence.business.product.label.productPrice') }}</label>
                                                    <input type="number" required  name="product_price" required class="form-control" value="{{ $product_detail->product_price }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">{{ trans('sentence.business.product.label.productBrand') }}</label>
                                                    <input type="text"  required name="product_brand" required class="form-control" value="{{ $product_detail->product_brand }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">{{ trans('sentence.business.product.label.productName') }}</label>
                                                    <input type="text"  required name="product_name" required class="form-control" value="{{ $product_detail->product_name }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">{{ trans('sentence.business.product.label.productQuantity') }}</label>
                                                    <input type="number" required name="product_quantity" class="form-control" value="{{ $product_detail->product_quantity }}">
                                                </div>
                                            </div>
                                        </div>
                                      </div>                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="card bg-white" style="margin-top: 0px !important;padding:0">
                                        <div class="card-body">
                                            <label for="">{{ trans('sentence.business.product.label.productDescription') }}</label>
                                            <textarea name="product_description" id="" cols="5" rows="5" class="form-control">{{ $product_detail->product_description }}</textarea>
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
                                        @foreach ($product_colors as $item)
                                        <div style="display: flex" class="mb-2" id="color_{{ $item->vendor_product_color_id }}">
                                            <input type="text" class="form-control" name="colors[]" value="{{ $item->product_color }}">
                                            <button type="button" style="background: red;border:none;outline:none" onclick="deleteColor('color_{{ $item->vendor_product_color_id }}')">{{ trans('sentence.business.product.button.remove') }}</button>
                                        </div>
                                        @endforeach
                                        </div>
                                        <button class="btn btn-success" id="addcolor" type="button">{{ trans('sentence.business.product.button.add') }}</button>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="card-title">{{ trans('sentence.business.product.label.productSizes') }}</h4>
                                        <label for="">{{ trans('sentence.business.product.label.addSizes') }}</label>
                                        
                                        <div id="dyn_sizes">
                                        @foreach ($product_sizes as $item)
                                        <div style="display: flex" class="mb-2" id="size_{{ $item->vendor_product_size_id }}">
                                            <input type="text" class="form-control" name="sizes[]" value="{{ $item->product_size }}">
                                            <button type="button" style="background: red;border:none;outline:none" onclick="deleteSize('size_{{ $item->vendor_product_size_id }}')">{{ trans('sentence.business.product.button.remove') }}</button>
                                        </div>
                                        {{-- <input type="text" class="form-control" name="sizes[]" value="{{ $item->product_size }}"> --}}
                                        @endforeach    
                                        </div>
                                        <button class="btn btn-success" id="addsize" type="button">{{ trans('sentence.business.product.button.add') }}</button>
                                    </div>
                                    </div>
                                </div>
                              </div>
                            <div class="card bg-white" style="margin-top: 0px !important;padding:0">
                                <div class="card-body">
                                    <h4 class="card-title">{{ trans('sentence.business.product.label.productImages') }}</h4>
                                    <div class="form-group">
                                        <label for="">{{ trans('sentence.business.product.label.addImage') }}</label>
                                        <input type="file" multiple name="" id="" class="form-control" style="width:40%">
                                    </div>
                                    <div class="row">
                                        
                                        @foreach ($product_images as $item)
                                        <div class="col-md-3">
                                            <div class="card bg-white" style="margin-top: 0px !important;padding:0">
                                                <img class="card-img-top" src="{{ URL::asset('assets/images/pro/01.png') }}" alt="Card image cap">
                                                {{-- <div class="card-body">
                                                  <center><a href="#" class="btn btn-danger text-white">Remove</a></center>
                                                </div> --}}
                                              </div>                                            
                                        </div>                                            
                                        @endforeach
                                    </div>
                                </div>
                              </div> 
                              @csrf
                              <button class="btn takfua-back text-white" type="submit">{{ trans('sentence.business.product.button.update') }}</button>
                            </form>                                                                      
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
</div>
</div>
{{-- <input type="hidden" id="csrf_token" value="{{ csrf_field() }}" /> --}}
<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
<!-- Bootstrap Core JS -->
<script src="{{ URL::asset('assets/js/popper.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        var i=1;
        $("#addcolor").click(()=>{
            i++;
            var color = `'color_${i}'`;
            $("#dyn_colors").append(
                '<div style="display: flex" class="mb-2" id='+color+'><input type="text" class="form-control" name="colors[]"><button  type="button" style="background: red;border:none;outline:none" onclick="deleteColor('+color+')">Remove</button></div>'
                );
        });

        var j=1;
        $("#addsize").click(()=>{
            var size = `'size_${j}'`;
            $("#dyn_sizes").append(
                '<div style="display: flex" class="mb-2" id='+size+'><input type="text" class="form-control" name="sizes[]"><button type="button" style="background: red;border:none;outline:none" onclick="deleteSize('+size+')">Remove</button></div>'
                );
        });
    });

    function getAjaxSubcategories(category_id){
        
        var url=`${ site_url }bus/ajaxSubCats`;
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
            $("#dyn_subcats").html(htmlstr);
        });
    }

    function deleteColor(divColor){
        $(`#${divColor}`).hide();
    }
    function deleteSize(divColor){
        $(`#${divColor}`).hide();
    }

</script>
</body>
</html>

