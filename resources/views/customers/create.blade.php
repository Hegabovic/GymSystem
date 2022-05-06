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


<form method="POST" action="{{ route('customers.store')}}">
@csrf
<div class="card-body">
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
          <label for="exampleFormControlInput1" class="form-label">Profile Image path</label>
            <input name="avatar_path" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="form-group">
          <label for="exampleFormControlInput1" class="form-label">User id</label>
            <input name="user_id" type="number" class="form-control" id="exampleFormControlInput1" placeholder="">
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
