@extends('layouts.app')
@section('content')

    <div class="container-fluid p-5">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class=" breadcrumb-item active">Show Orders
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">

                    <table id="datatable" class="table table-bordered text-center" style="color: black">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            @if ( request()->user()->hasrole('CityManager')|| request()->user()->hasrole('Admin'))
                                <th>Gym</th>
                            @endif

                            @if ( request()->user()->hasrole('Admin'))
                                <th>City</th>
                            @endif
                            <th>Created At</th>

                            @if ( request()->user()->hasrole('CityManager')|| request()->user()->hasrole('Admin'))
                                <th>Price</th>
                            @endif

                            <th>options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->customer->user->name}}</td>

                                @if ( request()->user()->hasrole('CityManager')|| request()->user()->hasrole('Admin'))
                                    <td>{{$order->gym->name}}</td>
                                @endif
                                @if(request()->user()->hasrole('Admin'))
                                    <td>{{$order->gym->city->name}}</td>
                                @endif

                                <td>
                                       <span class="badge badge-warning">
                                    {{$order->created_at->format('d-m-Y  h:iA')}}
                                    </span>

                                </td>

                                @if ( request()->user()->hasrole('CityManager')|| request()->user()->hasrole('Admin'))
                                    <td>${{$order->paid_price}}</td>
                                @endif
                                <td>
                                    <button class="btn btn-danger delete" id="{{$order->id}}"><i
                                            class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        <tbody>
                    </table>
                </div>
            </div>

            <script>
                $(document).ready(function () {
                    $('#datatable').DataTable();
                    sendDeleteRequest()

                    function sendDeleteRequest() {
                        $(document).on('click', '.delete', function (event) {
                            event.preventDefault();
                            let order_id = this.id;
                            let url = "{{route('delete.orders')}}" + `?id=${order_id}`;
                            let result = confirm('Are you sure you want to delete ?');
                            if (result) {
                                let row = $(this).parent().parent();
                                $.ajax({
                                    url: url,
                                    contentType: 'application/json',
                                    data: `{"id":"${order_id}"}`,
                                    type: 'DELETE',
                                    success: function (result) {
                                        if (result.success)
                                            row.remove()
                                        else
                                            alert(result.msg)
                                    }
                                });
                            }
                        });
                    }
                });
            </script>
@endsection
