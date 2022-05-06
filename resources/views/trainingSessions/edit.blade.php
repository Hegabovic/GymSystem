@extends('layouts.app')
@section('content')
    <form method="post" action="{{route("store_updated_trainingSession",$trainingSession->id)}}">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
                <label for="StartAt">Start at</label>
                <input type="datetime-local" name="startAt" class="form-control" id="StartAt"
                       value="{{$trainingSession->start_at->format('d-m-Y h:iA')}}">
            </div>
            <div class="form-group">
                <label for="FinishAt">Finish at</label>
                <input type="datetime-local" name="finishAt" class="form-control" id="FinishAt"
                       value="{{$trainingSession->finish_at->format('d-m-Y h:iA')}}">
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
