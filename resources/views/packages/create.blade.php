@extends('layouts.app')
@section('content')
    <div class="wrapper">

     

        <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create a new Package</h1>
                    </div><!-- /.col -->
                   
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


<form method="POST" action="{{ route('packages.store')}}">
@csrf
<div class="card-body">
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="form-group">
          <label for="exampleFormControlInput1" class="form-label">Price</label>
            <input name="price" type="number" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="form-group">
          <label for="exampleFormControlInput1" class="form-label">Number of sessions</label>
            <input name="number_of_sessions" type="number" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>

</div>

    <div class="card-footer">
              @can('permission_create_package_price')
                <button class="btn btn-success">Create</button>
              @endcan
    </div>

</form>


    </div>
    @if($errors->any())
        <div class="m-auto text-center">
            @foreach($errors->all() as $error)
                <li style="color: red;list-style: none"><strong>{{$error}}</strong></li>
            @endforeach
        </div>
    @endif
@endsection
