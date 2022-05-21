<div class="row mt-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" class="form-control" id="exampleInputEmail1"
                   placeholder="Enter name" name="name"
                   @if(isset($package))
                       value="{{$package->name}}"
                @endif
            >

        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Price</label>
            <input name="price" type="number" class="form-control" id="exampleFormControlInput1" placeholder=""
                   @if(isset($package))
                       value="{{$package->price}}"
                @endif
            >

        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Number of sessions</label>
            <input name="number_of_sessions" type="number" class="form-control" id="exampleFormControlInput1"
                   placeholder=""
                   @if(isset($package))
                       value="{{$package->number_of_sessions}}"
                @endif
            >
        </div>
    </div>
</div>

