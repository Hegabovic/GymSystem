@extends('layouts.app')
@section('content')
    <form method="post" action="{{route("store_updated_coach",$coach->id)}}">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" id="Name" value="{{$coach->name}}">
            </div>
            <div class="form-group">
                <label for="Phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="Phone" value="{{$coach->phone}}">
            </div>
            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" name="address" class="form-control" id="Address" value="{{$coach->address}}">
            </div>
        </div>

        <div class="card-footer">
            @can('permission_update_couch')
            <button type="submit" class="btn btn-primary">Submit</button>
            @endcan
        </div>
    </form>

    @if($errors->any())
        <div class="m-auto text-center">
            @foreach($errors->all() as $error)
                <li style="color: red;list-style: none"><strong>{{$error}}</strong></li>
            @endforeach
        </div>
    @endif
@endsection
