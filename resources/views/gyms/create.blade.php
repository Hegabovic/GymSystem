@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('store_gym')}}"enctype="multipart/form-data">
        @csrf
     <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label ">  name</label>
            <input name="name" class="form-control" id="exampleFormControlTextarea1" value="" rows="1">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label "> cover image</label>
            <input type="file" name="cover_image" class="form-control" id="exampleFormControlTextarea1" value="" rows="1">
       </div>


       <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">city</label>
                <select name="city_id" class="form-control">

                @foreach ($cities as $city)
                <option value="{{ $city->id }}"> {{ $city->name }} </option>
                @endforeach

                </select>
            </div>

         <button class="btn btn-success">create</button>

</form>
@endsection
