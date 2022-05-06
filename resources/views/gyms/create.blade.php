@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('store_gym')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label "> Name</label>
            <input name="name" class="form-control" id="exampleFormControlTextarea1">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label "> Cover image</label>
            <input type="file" name="cover_image" class="form-control" id="exampleFormControlTextarea1">
        </div>

        <div class="mb-3">
            <label for="City" class="form-label">City</label>
            <select id="City" name="city_id" class="form-control">
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}"> {{ $city->name }} </option>
                @endforeach
            </select>
        </div>

        @can('permission_create_Gym')
         <button class="btn btn-success">create</button>
         @endcan


    </form>
                
@endsection
