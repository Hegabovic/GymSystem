@extends('layouts.app')
@section('content')
    @include('forms.forms_without_logo_header')
    <form method="post" action="{{route("store_updated_trainingSession",$trainingSession->id)}}">
        @csrf
        @method('put')
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="StartAt">Start at</label>
                    <input type="datetime-local" name="startAt" class="form-control" id="StartAt"
                           placeholder="Start at"
                           @if(isset($training_session))
                               value="{{$training_session->start_at}}"
                        @endif
                    >
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="FinishAt">Finish at</label>
                    <input type="datetime-local" name="finishAt" class="form-control" id="FinishAt"
                           placeholder="Finish at"
                           @if(isset($training_session))
                               value="{{$training_session->finish_at}}"
                        @endif
                    >
                </div>
            </div>
        </div>
    @include('forms.form_footer')
@endsection
