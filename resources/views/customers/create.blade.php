@extends('layouts.app')
@section('content')
    <div class="wrapper">

     

        <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create a new Customer</h1>
                    </div><!-- /.col -->
                   
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


<form method="POST" action="{{ route('customers.store')}}"enctype="multipart/form-data">
@csrf
<div class="card-body">
<div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
            <input name="birth_date" type="date" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="form-group">
          <label for="exampleFormControlInput1" class="form-label">Gender</label>
          <select  name="gender"class="form-select" aria-label="Default select example">
          <option value="male">Male</option>
          <option value="female">Female</option>
         </select>
          </div>
          <div class="form-group">
        <label for="exampleInputFile">avatar image</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file"  id="avatar_input" name="avatar">
                <label class="custom-file-label" for="avatar_input">Choose file</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text">Upload</span>
            </div>
        </div>
    </div>

          
<div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
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
