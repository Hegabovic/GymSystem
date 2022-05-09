@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <form method="post" action="{{route("store_coach")}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" class="form-control" id="Name" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="Phone" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" name="address" class="form-control" id="Address" placeholder="Password">
                </div>
            </div>

            <div class="card-footer">
                @can('permission_create_coaches')
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endcan
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
