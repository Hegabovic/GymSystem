@extends('layouts.app')
@section('content')
@include('forms.forms_without_logo_header')

                            <form method="POST"
                                  action="{{route('update.attendances',['id'=>$thisAttendance->id])}} enctype="
                                  multipart
                            /form-data">
                            @csrf
                            @method('PUT')
                            {{-- @dd($attendance->customer) --}}


<div class="row mt-3">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="form-label ">Customer</label>
            <select class="form-control" name="user">
                @foreach ($attendances as $attendance)
                    {{-- @dd($attendance->customer) --}}
                    <option
                        value="{{$attendance->customer->id}}">{{$attendance->customer->user->email}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="form-label ">Gym</label>
            <select class="form-control" name="gym">
                @foreach ($attendances as $attendance)
                    {{-- @dd($attendance->gym) --}}
                    <option value="{{$attendance->gym->id}}">{{$attendance->gym->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>


<div class="row mt-3">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="form-label ">Training Session</label>
            <select class="form-control" name="training_session">
                @foreach ($attendances as $attendance)
                    {{-- @dd($posts->user->id) --}}
                    <option
                        value="{{$attendance->training_session->id}}">{{$attendance->training_session->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>



@include('forms.form_footer')

@endsection
