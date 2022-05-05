@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <form method="post" action="{{route("store_trainingSession")}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" class="form-control" id="Name" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="StartAt">Start at</label>
                    <input type="text" name="startAt" class="form-control" id="StartAt" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="FinishAt">Finish at</label>
                    <input type="text" name="FinishAt" class="form-control" id="FinishAt" placeholder="Password">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
