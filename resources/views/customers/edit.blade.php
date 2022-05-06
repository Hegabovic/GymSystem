@extends('layouts.app')
@section('content')
    <div class="wrapper">

     

    

<form method="POST" action="{{route('customers.update',$customer->id)}}">
@csrf
@method('put')
<div class="card-body">
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
            <input name="birth_date" type="date" value="{{ $customer['birth_date'] }}"  class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="form-group">
          <label for="exampleFormControlInput1" class="form-label">Gender</label>
          <select  name="gender"class="form-select" value="{{ $customer['gender'] }}" aria-label="Default select example">
          <option value="male">Male</option>
          <option value="female">Female</option>
         </select>
          </div>
          <div class="form-group">
          <label for="exampleFormControlInput1" class="form-label">Profile Image path</label>
            <input name="avatar_path" type="text" value="{{ $customer['avatar_path'] }}"  class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
         
</div>
<div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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
