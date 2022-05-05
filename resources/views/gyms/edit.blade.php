
@extends('layouts.app')
@section('content')
 <form method="POST" action="">
        @csrf
     <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label ">  name</label>
            <input name="name" class="form-control" id="exampleFormControlTextarea1" value="{{ $gym->name }}" rows="1">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label ">  created at</label>
            <input name="name" class="form-control" id="exampleFormControlTextarea1" value="{{ $gym->created_at }}" rows="1">
        </div>


        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label "> cover image</label>
            <input name="name" class="form-control" id="exampleFormControlTextarea1" value="{{ $gym->cover_image }}" rows="1">
       </div>

         <button class="btn btn-success">Update</button>

</form>
@section('content')

