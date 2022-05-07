@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('city.update',$city->id) }}" enctype="multipart/form-data" >
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label @error('cityName') is-invalid @enderror"> city name</label>
            <input name="cityName" class="form-control" id="exampleFormControlTextarea1" value="{{ $city->name }}" rows="1">
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        <button type="submit" class="btn btn-success">Update</button>
    </form>

@endsection
