@extends('layouts.app')
@section('content')
    <form method="post" action="{{ route('store_gyms',$gym->id) }}" enctype="multipart/form-data">
        @csrf
        @method("put")
        
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label "> Name</label>
            <input name="name" class="form-control" id="exampleFormControlTextarea1" value="{{ $gym->name }}">
        </div>

        <div class="form-group">
            <label for="Image" class="form-label "> Cover image</label>
            <input type="file" name="cover_image" class="form-control" id="Image">
        </div>

        <div class="form-group">
            <label for="City">City</label>
            <select name="city_id" id="City" class="form-control">
                @foreach($cities as $city)
                    @if($gym->city->name == $city->name)
                        <option selected value="{{$city->id}}">{{$city->name}}</option>
                    @else
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>


        @can('permission_Update_Gym')
            <button class="btn btn-success">Update</button>
        @endcan

    </form>
@endsection
