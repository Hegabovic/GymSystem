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
                        <h1 class="m-0">Create a new Package</h1>
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
        <form method="POST" action="{{ route('packages.update', ['package' => $package['id']]) }}">
            @csrf
            {{ csrf_field() }}
            {{ method_field('put') }} 
            
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input name="name" value="{{ $package['name'] }}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Price</label>
            <input name="price" value="{{ $package['price'] }}" type="number" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Number of sessions</label>
            <input name="number_of_sessions" value="{{ $package['number_of_sessions'] }}" type="number" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          


          <button class="btn btn-success">Update</button>
        </form>
                       
    </div>
@endsection
