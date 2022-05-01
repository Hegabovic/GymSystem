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
                                <h5 class="card-title">Monthly Recap Report</h5>

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
                            <form >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="user-name">Name</label>
                                        <div class="row">
                                            <div class="col-4">
                                                <input type="text" class="form-control" placeholder="name" name="username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="exampleInputPassword1">Confirm Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_confirmation">
                                    </div>
                                    <div class="form-group col-3 ">
                                        {{--<label for="roles-menu">Assign role</label>
                                        <select class="form-control" id="roles-menu" name="role">
                                            <option>City manager</option>
                                            <option>Gym Manager</option>
                                        </select>--}}
                                        <label>Assign role</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                City-manager
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Gym-manager
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="exampleInputFile">avatar photo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            <!-- ./card-body -->

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
