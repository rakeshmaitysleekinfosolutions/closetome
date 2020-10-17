@include('includes.header')
<body class="bg-default-light">
<div class="white shadow">
    <div class="container-fluid">
        @include('business.busi_header')
    </div>
</div>

<div class="container-fluid my-5">
    <div class="margin-25">
        <div class="row">
            <div class="col-md-2 col-sm-2  d-sm-block">
                @include('business.bus_sidebar')
            </div>


            <div class="col-md-10 col-sm-10">
                <div class="row">
                    <div class="col-md-12 col-sm-12 bg-white main-shadwo">
                        <div class="row bg-header border-bottom">
                            <div class="col-md-12 col-sm-12">
                                <div class="navbar-nav my-4 margin-25">
                                <div class="h3">{{ ucwords(trans('sentence.Manage_products')) }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="enter-conta">
                            <div class="row justify-content-center">
                                <div class="table-responsive">
                                    <a href="{{ route('bus/addproduct')}}" class="btn takfua-back text-white btn-just-icon btn-sm">{{ ucfirst(trans('sentence.business.product.label.addProduct')) }}</a>
                                    <table class="table table-striped mt-2">
                                        <thead>

                                        <tr class="takfua-back">
                                            <th class="text-center">#</th>
                                            {{-- <th>Product Image</th> --}}
                                            <th class="text-center">{{ ucfirst(trans('sentence.business.product.label.name')) }}</th>
                                            <th class="text-center">{{ ucfirst(trans('sentence.business.product.label.price')) }}</th>
                                            <th class="text-center">{{ ucfirst(trans('sentence.business.product.label.quantity')) }}</th>
                                            <th class="text-center">{{ ucfirst(trans('sentence.business.product.label.action')) }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            @foreach ($products as $p)
                                                <tr>
                                                    <td class="text-center">{{ ++$i }}</td>
                                                    {{-- <td>
                                                        <img src="{{ URL::asset('assets/images/pro/01.png') }}" alt="" width="80px">
                                                    </td> --}}
                                                    <td class="text-center">{{ $p->product_brand . ' ' .$p->product_name }}</td>
                                                    <td class="text-center">{{ $p->product_price }}</td>
                                                    <td class="text-center">{{ $p->product_quantity}}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('bus/editproduct',['id'=>base64_encode($p->vendor_product_id)]) }}" data-toggle="tooltip" data-placement="bottom" class="btn btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                                                        <a href="{{route('bus/singleproduct',['id'=>base64_encode($p->vendor_product_id)])}}" data-toggle="tooltip" data-placement="bottom" class="btn btn-success" title="View"><i class="fas fa-eye"></i></a>
                                                        <a href="{{ route('bus/deleteProduct',['id'=>base64_encode($p->vendor_product_id)])}}" class="btn btn-danger" data-toggle="tooltip"  data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
</div>
</div>
<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
<!-- Bootstrap Core JS -->
<script src="{{ URL::asset('assets/js/popper.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</body>
</html>

