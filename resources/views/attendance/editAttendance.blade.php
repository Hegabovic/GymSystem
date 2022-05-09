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
                                <h5 class="card-title">Creating Attendances</h5>

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
                            <!-- /.card-header -->

                            {{-- <form> --}}

                            <form method="POST"
                                  action="{{route('update.attendances',['id'=>$thisAttendance->id])}} enctype="
                                  multipart
                            /form-data">
                            @csrf
                            @method('PUT')
                            {{-- @dd($attendance->customer) --}}

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label ">Customer</label>
                                <select class="form-control" name="user">
                                    @foreach ($attendances as $attendance)
                                        {{-- @dd($attendance->customer) --}}
                                        <option
                                            value="{{$attendance->customer->id}}">{{$attendance->customer->user->email}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label ">Gym</label>
                                <select class="form-control" name="gym">
                                    @foreach ($attendances as $attendance)
                                        {{-- @dd($attendance->gym) --}}
                                        <option value="{{$attendance->gym->id}}">{{$attendance->gym->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label ">Training Session</label>
                                <select class="form-control" name="training_session">
                                    @foreach ($attendances as $attendance)
                                        {{-- @dd($posts->user->id) --}}
                                        <option
                                            value="{{$attendance->training_session->id}}">{{$attendance->training_session->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            {{-- <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">City Name</label>
                                <input type="text" class="form-control" value="{{$attendance->gym->city->name}}" Name="city_name" />
                            </div> --}}

                            <button class="btn btn-primary btn-lg">Update</button>
                            </form>

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
