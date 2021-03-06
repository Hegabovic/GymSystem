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
                                <tr>
                                    <th style="text-align: center;">id</th>
                                    <th style="text-align: center;">user name</th>
                                    <th style="text-align: center;">email</th>
                                    <th style="text-align: center;">training session name</th>
                                    <th style="text-align: center;">attendance date</th>
                                    <th style="text-align: center;">attendance time</th>
                                    @if ( request()->user()->hasrole('CityManager')|| request()->user()->hasrole('Admin'))
                                    <th style="text-align: center;">Gym</th>
                                    @endif
                                    @if (request()->user()->hasrole('Admin'))
                                    <th style="text-align: center;">City</th>
                                    @endif
                                    <th style="text-align: center;">options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($items as $table)
                                     @if ( ! $table->trashed())

                                    <tr align="center">
                                        <td style="text-align: center;">{{$table->id}}</td>
                                        <td style="text-align: center;">{{$table->customer->user->name}}</td>
                                        <td style="text-align: center;">{{$table->customer->user->email}}</td>
                                        <td style="text-align: center;">{{$table->training_session->name}}</td>

                                        @if($table->created_at)
                                            <td style="text-align: center;">{{$table->created_at->toDateString() }}</td>
                                        @endif

                                        @if($table->created_at)
                                            <td style="text-align: center;">{{$table->created_at->format('H:i')}}</td>
                                        @endif

                                        @if ( request()->user()->hasrole('CityManager')|| request()->user()->hasrole('Admin'))
                                        <td style="text-align: center;">{{$table->gym->name}}</td>
                                        @endif

                                        @if ( request()->user()->hasrole('Admin'))
                                        <td style="text-align: center;">{{$table->gym->city->name}}</td>
                                        @endif

                                        <td style="text-align: center;">
                                            <button class="btn btn-danger delete" id="{{$table->id}}"><i class="fas fa-trash-alt"></i></button>
                                            <a href="{{ route('edit.attendances',  $table->id) }}" class="btn btn-primary edit"><i class="fas fa-edit"></i>
                                            </a>

                                        </td>
                                    </tr>
                                    @endif
                                @endforeach

                                <script>
                                    $(document).on('click', '.delete', function () {
                                        let attend = confirm('Are you sure you want to delete ?');
                                        if (attend) {
                                            let row = $(this).parent().parent()
                                            $(this).parent().parent().css("background-color", "grey");

                                            let attendanceId = this.id;
                                            $.ajax({
                                                url: "{{route('delete.attendances')}}" + `?id=${attendanceId}`,
                                                type: 'DELETE',
                                                contentType: 'application/json',
                                                data: `{"id":"${attendanceId}"}`,
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

