@extends('restaurantportal.layouts.master')
@section('content')
    <div class="col-md-10 col-sm-12 bg-white main-shadwo">
        <div class="row bg-header border-bottom">
            <div class="col-md-12 col-sm-12">
                <div class="navbar-nav my-4 margin-25">
                    <div class="h3">{{ trans('sentence.restaurant.customer.label.title') }}</div>
                </div>
            </div>
        </div>

        <div class="enter-conta">
            <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table table-striped mt-2" id="datatables">
                        <thead>
                        <tr class="takfua-back">
                            <th class="text-center">#</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.order.label.number')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.customer.label.name')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.order.label.type')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.order.label.date')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.order.label.amount')) }}</th>
                            <th class="text-center">{{ ucfirst(trans('sentence.restaurant.order.label.total')) }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    var myLabel                 = myLabel || {};
    myLabel.token               = '{{Session::token()}}'
</script>
<script>
    $(function() {
        $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: '',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'type', name: 'type' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' }
            ]
        });
    });
</script>
