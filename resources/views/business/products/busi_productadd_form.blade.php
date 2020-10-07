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
                            <form action="{{route('bus/addproductsubmit')}}" method="post" enctype="multipart/form-data">
                            <a href="{{route('bus/products') }}" class="btn btn-primary">{{ trans('sentence.business.product.label.back') }}</a>
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
                                                        <select name="category_id" id="category_id" class="form-control" onchange="getAjaxSubcategories(this.value)" required>
                                                            <option value="">{{ trans('sentence.business.product.label.selectOne') }}</option>
                                                            @foreach ($categories as $item)
                                                                <option value="{{$item->category_id}}">{{$item->category_name}}</option>
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
                                                    <label for="">{{ trans('sentence.business.product.label.productPrice') }}</label>
                                                    <input type="number" required  name="product_price" required class="form-control" value="">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">{{ trans('sentence.business.product.label.productBrand') }}</label>
                                                    <input type="text"  required name="product_brand" required class="form-control" value="">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">{{ trans('sentence.business.product.label.productName') }}</label>
                                                    <input type="text"  required name="product_name" required class="form-control" value="">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">{{ trans('sentence.business.product.label.productQuantity') }}</label>
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
                                        <button class="btn btn-success" id="addcolor" type="button">{{ trans('sentence.business.product.button.add') }}</button>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="card-title">{{ trans('sentence.business.product.label.productSizes') }}</h4>
                                        <label for="">{{ trans('sentence.business.product.label.addSizes') }}</label>
                                        
                                        <div id="dyn_sizes">
                                        </div>
                                        <button class="btn btn-success" id="addsize" type="button">{{ trans('sentence.business.product.button.add') }}</button>
                                    </div>
                                    </div>
                                </div>
                              </div>
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
                              @csrf
                              <button class="btn btn-primary" type="submit">{{ trans('sentence.business.product.button.submit') }}</button> 
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
        $(`#${divColor}`).remove();
    }
    function deleteSize(divColor){
        $(`#${divColor}`).remove();
    }

</script>
</body>
</html>

