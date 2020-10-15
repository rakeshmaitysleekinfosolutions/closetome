@extends('restaurantportal.layouts.master')
@section('content')
    <div class="col-md-10 col-sm-12 bg-white main-shadwo">
        <div class="row bg-header border-bottom">
            <div class="col-md-12 col-sm-12">
                <div class="navbar-nav my-4 margin-25">
                    <div style="display: flex;justify-content: flex-end">

                        <a href="{{ route('dish.add')}}" class="btn takfua-back text-white btn-just-icon btn-sm"><i class="fas fa-plus"></i>&nbsp;{{ ucfirst(trans('sentence.restaurant.menu.button.add')) }}</a>&nbsp;
                        <button id="delete" type="button" class="btn takfua-back text-white"><i class="fas fa-trash"></i>&nbsp;{{ trans('sentence.restaurant.menu.button.delete') }}</button>
                    </div>
                    <div class="h3">{{ trans('sentence.restaurant.menu.label.title') }}</div>

                </div>
            </div>
        </div>

        <div class="enter-conta">
            <div class="row justify-content-center">
                <div class="table-responsive">

                    <table class="table table-striped mt-2 datatable">
                        <thead>
                        <tr class="takfua-back">
                            <th class="text-center" style="width: 2%;">
                                <label class="css-control css-control-primary css-checkbox py-0">
                                    <input type="checkbox" class="css-control-input" id="checkAll" name="checkAll">
                                    <span class="css-control-indicator"></span>
                                </label>
                            </th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.menu.columns.name')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.menu.columns.description')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.menu.columns.type')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.menu.columns.size')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.menu.columns.price')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.menu.columns.createdAt')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.menu.columns.updatedAt')) }}</th>

                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.menu.columns.action')) }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var myLabel                 = myLabel || {};
        myLabel.token               = '{{Session::token()}}'
        !function ($) {
            var   dataTable = ($.fn.dataTable !== undefined);

            if ($(".datatable").length > 0 && dataTable) {
                console.log($(".datatables"));
                var dataTable = $('.datatable').DataTable( {
                    "processing": true,
                    'language': {
                        'loadingRecords': '&nbsp;',
                        'processing': '<div class="spinner"></div>'
                    },
                    "searching" : true,
                    "paging": true,
                    "order" : [],
                    "ajax": {
                        "url": '{{route('dish.fetch')}}',
                        "type": 'POST',
                        "dataSrc": "data"
                    },
                    "oLanguage": {
                        "sEmptyTable": "Empty Table"
                    },
                    dom: 'lBfrtip',
                    buttons: [
                        'excel', 'csv', 'pdf'
                    ],
                    "columnDefs": [ {
                        "targets": 0,
                        "orderable": false
                    },{
                        visible: false
                    } ],
                    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
                }).on('click', '.edit', function (e) {
                    // var id = $(this).data('id');
                    // var country_descriptions_id = $(this).data('country_descriptions_id');
                    // window.location.href = myLabel.edit + id + '/' + country_descriptions_id;
                }).on('click', '#checkAll', function () {
                    $('.datatable input[type=checkbox]').prop('checked', this.checked);
                });
            }
        }(window.jQuery);
        $(document).on('click', '#delete', function (e) {
            var selected = [];
            $('.datatable .selectCheckbox').each(function () {
                if ($(this).is(":checked")) {
                    var id = $(this).data('id');

                    if (id != undefined || id != 0 || id != '' || id != null) {
                        selected.push(id);
                    }
                }
            });

            if (selected.length > 0) {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        setTimeout(function () {
                            $.ajax({
                                type: "POST",
                                url: {{'dish.delete'}},
                                data: {selected: selected},
                                cache: false,
                                success: function (res) {
                                    if (res.status === true) {
                                        swal(res.message);
                                    } else {
                                        swal(res.message);
                                    }

                                    dataTable.ajax.reload();
                                }
                            });
                        }, 2000);
                    });

            } else {
                swal("You must select one record");
            }
        });
    </script>
@endpush
