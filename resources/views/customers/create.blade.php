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
          <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Female
  </label>
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
