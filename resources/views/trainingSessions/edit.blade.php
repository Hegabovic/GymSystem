@extends('layouts.app')
@section('content')
    <form method="post" action="{{route("store_updated_trainingSession",$trainingSession->id)}}">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" id="Name" value="{{$trainingSession->name}}">
            </div>
            <div class="form-group">
                <label for="StartAt">Start at</label>
                <input type="date" name="startAt" class="form-control" id="StartAt"
                       value="{{$trainingSession->start_at}}">
            </div>
            <div class="form-group">
                <label for="FinishAt">Finish at</label>
                <input type="date" name="finishAt" class="form-control" id="FinishAt"
                       value="{{$trainingSession->finish_at}}">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
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
