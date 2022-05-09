@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard v2</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">orders</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->

                <!-- /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Orders</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <!-- ./card-body -->
                            <table id="example" class="table table-bordered" style="color: black">
                                <thead>

                                <tr>
                                    <th style="text-align: center;">package ID</th>
                                    <th style="text-align: center;">Customer Name</th>
                                    @if ( request()->user()->hasrole('CityManager')|| request()->user()->hasrole('Admin'))
                                        <th style="text-align: center;">Gym</th>
                                    @endif
                                    @if ( request()->user()->hasrole('CityManager')|| request()->user()->hasrole('Admin'))
                                        <th style="text-align: center;">city</th>
                                    @endif
                                    <th style="text-align: center;">price</th>
                                    @if ( request()->user()->hasrole('CityManager')|| request()->user()->hasrole('Admin'))
                                        <th style="text-align: center;">created_at</th>
                                    @endif

                                    <th style="text-align: center;">options</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach ($items as $table)
                                    @if ( ! $table->trashed())

                                        <tr>
                                            <td style="text-align: center;">{{$table->id}}</td>
                                            <td style="text-align: center;">{{$table->customer->user->name}}</td>
                                            @if ( request()->user()->hasrole('CityManager')|| request()->user()->hasrole('Admin'))
                                                <td style="text-align: center;">{{$table->gym->name}}</td>
                                            @endif
                                            @if ( request()->user()->hasrole('CityManager')|| request()->user()->hasrole('Admin'))
                                                <td style="text-align: center;">{{$table->gym->city->name}}</td>
                                            @endif
                                            <td style="text-align: center;">{{$table->paid_price }}</td>
                                            @if ( request()->user()->hasrole('CityManager')|| request()->user()->hasrole('Admin'))
                                                <td style="text-align: center;">{{$table->created_at->format('H:i')}}</td>
                                            @endif
                                            <td style="text-align: center;">
                                                <button class="btn btn-danger delete" id="{{$table->id}}"><i
                                                        class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                                <script>
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

                                    sendDeleteRequest()
                                </script>

                                <tbody>
                            </table>
                            <script>
                                $(document).ready(function () {
                                    $('#example').DataTable();
                                });
                            </script>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Main row -->

                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
    </div>
@endsection
