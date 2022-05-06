@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <form method="post" action="{{route("store_trainingSession")}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" class="form-control" id="Name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="StartAt">Start at</label>
                    <input type="datetime-local" name="startAt" class="form-control" id="StartAt"
                           placeholder="Start at">
                </div>
                <div class="form-group">
                    <label for="FinishAt">Finish at</label>
                    <input type="datetime-local" name="finishAt" class="form-control" id="FinishAt"
                           placeholder="Finish at">
                </div>
                <div class="form-group">
                    <label for="Coach" class="form-label">Coach</label>
                    <select id="Coach" name="coachId" class="form-control">

                        @foreach ($coaches as $coach)
                            <option value="{{ $coach->id }}"> {{ $coach->name }} </option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    @if($isOverlap)
        <div class="m-auto text-center">
            <li style="color: red;list-style: none">
                <strong>session time is overlapped with other session</strong>
            </li>
        </div>
    @endif

    @if($errors->any())
        <div class="m-auto text-center">
            @foreach($errors->all() as $error)
                <li style="color: red;list-style: none"><strong>{{$error}}</strong></li>
            @endforeach
        </div>
    @endif
@endsection
