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
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
