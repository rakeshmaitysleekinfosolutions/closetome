@extends('restaurantportal.layouts.master')
@section('content')

    <div class="col-md-10 col-sm-12">
        <form id="frm" action="{{route('dish.update', [$id])}}" method="post" enctype="multipart/form-data">
        <div class="">
            <div class="col-md-12 col-sm-12 bg-white main-shadwo">
                <div class="row bg-header border-bottom">
                    <div class="col-md-12 col-sm-12">
                        <div class="navbar-nav my-4 margin-25">
                            <div class="h3">{{ trans('sentence.restaurant.menu.label.title') }}</div>
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
                            <div class="col-md-12">
                                <div class="card bg-white" style="margin-top: 0px !important;padding:0">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ trans('sentence.restaurant.menu.label.dishDetails') }}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.menu.entry.name') }}<span class="text-danger">*</span></label>
                                                    <input type="text" required name="name" class="form-control" value="{{$name}}" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.menu.entry.type') }}<span class="text-danger">*</span></label>
                                                    <input type="text" name="type" class="form-control" value="{{$type}}" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.menu.entry.size') }}<span class="text-danger">*</span></label>
                                                    <input type="text" name="size" class="form-control" value="{{$size}}" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.menu.entry.price') }}<span class="text-danger">*</span></label>
                                                    <input type="text" name="price" class="form-control" value="{{$price}}" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">{{ trans('sentence.restaurant.menu.entry.description') }}<span class="text-danger">*</span></label>
                                                    <textarea name="description" cols="5" rows="5" class="form-control" required>{{$description}}</textarea>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>


                        <div class="table-responsive">
                            <table id="images" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th colspan="3">
                                       Dish Images
                                    </th>
                                    <tr>
                                        <td class="text-left">Image</td>
                                        <td>Upload File</td>
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
                                                    <img src="{{$image['thumb']}}" alt="" title="" data-placeholder="{{$placeholder}}>"/>
                                                    <input type="hidden" name="images[{{ $imageRow}}][old_images]" value="{{$image['thumb']}}" id="input-image{{ $imageRow}}"/>
                                                </td>
                                                <td>
                                                    <input type="file" name="images[{{ $imageRow}}][image]" class="form-control">
                                                </td>
                                                <td class="text-left"><button type="button" data-url="{{route('dish.delete.image', [$id])}}" data-row="{{$imageRow}}" data-id="{{$image['id']}}" data-toggle="tooltip" title="Delete" class="btn btn-danger delete"><i class="fa fa-minus-circle"></i></button></td>
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

                        @csrf

                </div>
            </div>
        </div>
        </form>
    </div>

@endsection
<script>
    var myLabel             = myLabel || {};
    myLabel.imageRow        = '<?php echo $imageRow;?>';
    myLabel.placeholder     = '<?php echo $placeholder;?>';

</script>
