@extends('layouts.user_profile_layout')
@section('title','User Dashboard')
@section('content')
<div class="container my-4">
    <div class="margin-25">
        <div class="row">

            @include('includes.headers.sidemenu')            

            <div class="col-md-9 col-sm-12">
                <div class="col-md-12 col-sm-12 bg-white main-shadwo">
                    <div class="row bg-header">
                        <div class="col-md-12 col-sm-12">
                            <div class="navbar-nav my-4 margin-25">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3><span class="glyphicon glyphicon-shopping-cart"></span>My Order History</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="mytable" class="table table-bordred table-striped">
                                        <thead>
                                        <th><input type="checkbox" id="checkall" /></th>
                                        <th>Shop</th>
                                        <th>Product</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td><input type="checkbox" class="checkthis" /></td>
                                                <td>Mohsin</td>
                                                <td>Irshad</td>
                                                <td>CB 106/107 Street # 11</td>
                                                <td>mohsin@gmail.com</td>
                                                <td>
                                                    <i class="fa fa-eye text-warning"></i>
                                                    &nbsp;&nbsp;<i class="fa fa-trash text-danger"></i>
                                                    <span>Reorder</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" class="checkthis" /></td>
                                                <td>Mohsin</td>
                                                <td>Irshad</td>
                                                <td>CB 106/107 Street # 11</td>
                                                <td>mohsin@gmail.com</td>
                                                <td>
                                                    <i class="fa fa-eye text-warning"></i>
                                                    &nbsp;&nbsp;<i class="fa fa-trash text-danger"></i>
                                                    <span>Reorder</span>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><input type="checkbox" class="checkthis" /></td>
                                                <td>Mohsin</td>
                                                <td>Irshad</td>
                                                <td>CB 106/107 Street # 11</td>
                                                <td>mohsin@gmail.com</td>
                                                <span>Reorder</span>
                                                <td>
                                                    <i class="fa fa-eye text-warning"></i>
                                                    &nbsp;&nbsp;<i class="fa fa-trash text-danger"></i>
                                                    <span>Reorder</span>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td><input type="checkbox" class="checkthis" /></td>
                                                <td>Mohsin</td>
                                                <td>Irshad</td>
                                                <td>CB 106/107 Street # 11</td>
                                                <td>mohsin@gmail.com</td>
                                                <td>
                                                    <i class="fa fa-eye text-warning"></i>
                                                    &nbsp;&nbsp;<i class="fa fa-trash text-danger"></i>
                                                    <span>Reorder</span>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><input type="checkbox" class="checkthis" /></td>
                                                <td>Mohsin</td>
                                                <td>Irshad</td>
                                                <td>CB 106/107 Street # 11</td>
                                                <td>mohsin@gmail.com</td>
                                                <td>
                                                    <i class="fa fa-eye text-warning"></i>
                                                    &nbsp;&nbsp;<i class="fa fa-trash text-danger"></i>
                                                    <span>Reorder</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input class="form-control " type="text" placeholder="Mohsin">
                                    </div>
                                    <div class="form-group">

                                        <input class="form-control " type="text" placeholder="Irshad">
                                    </div>
                                    <div class="form-group">
                                        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>


                                    </div>
                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                                </div>
                            </div>
                            <!-- /.modal-content --> 
                        </div>
                        <!-- /.modal-dialog --> 
                    </div>



                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>    

@endsection