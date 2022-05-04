@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                    <th>package ID</th>
                                    <th>Customer Name</th>
                                    <th>Gym</th>
                                    <th>city</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($items as $table)
                                    @if ( ! $table->trashed())
                                        <tr>
                                            <td>{{$table->id}}</td>
                                            <td>{{$table->customer->user->name}}</td>

                                            <td>{{$table->gym->name}}</td>
                                            <td>{{$table->gym->city->name}}</td>
                                            <td>
                                                <button class="btn btn-primary delete" id="{{$table->id}}">Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                                <script>
                                    $(document).on('click', '.delete', function () {
                                        $confirm = confirm('Are you sure you want to delete ?');
                                        if ($confirm) {
                                            let row = $(this).parent().parent()
                                            row.css("background-color", "grey");

                                            let order_id = this.id;
                                            console.log(order_id)
                                            $.ajax({
                                                url: "{{route('delete.orders')}}" + `?id=${order_id}`,
                                                type: 'DELETE',
                                                contentType: 'application/json',
                                                data: `{"id":"${order_id}"}`,
                                                success: function (result) {
                                                    row.remove();
                                                }
                                            });
                                        }
                                    });
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
