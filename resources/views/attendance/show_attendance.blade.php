@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard v2</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Attendances</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-tool dropdown-toggle"
                                                data-toggle="dropdown">
                                            <i class="fas fa-wrench"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <a href="#" class="dropdown-item">Action</a>
                                            <a href="#" class="dropdown-item">Another action</a>
                                            <a href="#" class="dropdown-item">Something else here</a>
                                            <a class="dropdown-divider"></a>
                                            <a href="#" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <table id="example" class="table table-bordered" style="color: black">
                                <thead>
                                <tr align="center">
                                    <th>Id</th>
                                    <th>user name</th>
                                    <th>email</th>
                                    <th>training session name</th>
                                    <th>attendance date</th>
                                    <th>attendance time</th>
                                    <th>Gym</th>
                                    <th>City</th>
                                    <th>options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($items as $table)
                                    <tr align="center">
                                        <td>{{$table->id}}</td>
                                        <td>{{$table->customer->user->name}}</td>
                                        <td>{{$table->customer->user->email}}</td>
                                        <td>{{$table->training_session->name}}</td>

                                        @if($table->created_at)
                                            <td>{{$table->created_at->toDateString() }}</td>
                                        @endif

                                        @if($table->created_at)
                                            <td>{{$table->created_at->format('H:i')}}</td>
                                        @endif
                                        <td>{{$table->gym->name}}</td>
                                        <td>{{$table->gym->city->name}}</td>
                                        <td>
                                            <button class="btn btn-danger delete" id="{{$table->id}}"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                @endforeach

                                <script>
                                    $(document).on('click', '.delete', function () {
                                        let attend = confirm('Are you sure you want to delete ?');
                                        if (attend) {
                                            let myThis = $(this).parent().parent()
                                            $(this).parent().parent().css("background-color", "grey");

                                            let Attendance_id = this.id;
                                            $.ajax({
                                                url: "{{route('delete.attendances')}}" + `?id=${Attendance_id}`,
                                                type: 'DELETE',
                                                contentType: 'application/json',
                                                data: `{"id":"${Attendance_id}"}`,
                                                success: function (result) {
                                                    myThis.remove();
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
