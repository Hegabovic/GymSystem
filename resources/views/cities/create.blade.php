@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create City</h3>
            </div>
            <form action="{{ route('store_city') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="cityName">City Name</label>
                        <input type='text' class="form-control" name="cityName" id="cityName"
                               placeholder="Enter city name">
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add City</button>
                </div>
            </form>
        </div>
    </div>
@endsection
