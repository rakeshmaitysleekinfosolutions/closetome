@extends('layouts.seller')
@section('content')
    <div class="col-md-10 col-sm-12 bg-white main-shadwo">

        <div class="row bg-header border-bottom">
            <div class="col-md-12 col-sm-12">
                <div class="navbar-nav my-4 margin-25">
                    <div style="display: flex;justify-content: flex-end">

                        <a href="{{ route('shop.product.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>&nbsp;{{ ucfirst(trans('sentence.restaurant.menu.button.add')) }}</a>&nbsp;
                        <button id="delete" type="button" class="btn btn-primary"><i class="fas fa-trash"></i>&nbsp;{{ trans('sentence.restaurant.menu.button.delete') }}</button>
                    </div>
                    <div class="h3">{{ ucwords(trans('sentence.Manage_products')) }}</div>
                    @if(session()->has('message'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('message') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
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
                            <th class="">{{ ucfirst(trans('sentence.business.product.label.no')) }}</th>
                            <th class="">{{ ucfirst(trans('sentence.business.product.label.name')) }}</th>
                            <th class="">{{ ucfirst(trans('sentence.business.product.label.price')) }}</th>
                            <th class="">{{ ucfirst(trans('sentence.business.product.label.quantity')) }}</th>
                            <th class="">{{ ucfirst(trans('sentence.restaurant.menu.columns.createdAt')) }}</th>
{{--                            <th class="">{{ ucfirst(trans('sentence.restaurant.menu.columns.updatedAt')) }}</th>--}}

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

                var dataTable = $('.datatable').DataTable( {
                    "processing": true,
                    'language': {
                        "decimal":        "",
                        "emptyTable":     "No hay datos disponibles en la tabla",
                        "info":           "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                        "infoEmpty":      "Mostrando 0 to 0 de 0 entradas",
                        "infoFiltered":   "(filtrado desde _MAX_ total entradas)",
                        "infoPostFix":    "",
                        "thousands":      ",",
                        "lengthMenu":     "Mostrar _MENU_ entradas",
                        "loadingRecords": "Cargando...",
                        "search":         "Buscar:",
                        "zeroRecords":    "No se encontraron registros coincidentes",
                        "paginate": {
                            "first":      "Primero",
                            "last":       "último",
                            "next":       "Siguiente",
                            "previous":   "Previo"
                        },
                        "aria": {
                            "sortAscending":  ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        },
                        'loadingRecords': '&nbsp;',
                        'processing': '<div class="spinner"></div>'
                    },
                    "searching" : true,
                    "paging": true,
                    "order" : [],
                    "ajax": {
                        "url": '{{route('shop.product.fetch')}}',
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
