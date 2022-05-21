
<div class="row mt-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" class="form-control" id="exampleInputEmail1"
                   placeholder="Enter name" name="name"
                   @if(isset($training_session))
                       value="{{$training_session->name}}"
                @endif
            >
        </div>
    </div>
</div>
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

<div class="row mt-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="Coaches">Coaches</label>
            <select id="Coaches" name="coaches[]" multiple="multiple" class="form-control">
                @foreach ($coaches as $coach)
                    <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
