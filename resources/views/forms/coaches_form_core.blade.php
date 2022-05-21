
<div class="row mt-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" class="form-control" id="exampleInputEmail1"
                   placeholder="Enter name" name="name"
                   @if(isset($coach))
                       value="{{$coach->name}}"
                @endif
            >
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="Phone">Phone</label>
            <input type="text" name="phone" class="form-control" id="Phone" placeholder="Password"
                   @if(isset($coach))
                       value="{{$coach->phone}}"
                @endif
            >

        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="Address">Address</label>
            <input type="text" name="address" class="form-control" id="Address" placeholder="Password"
                   @if(isset($coach))
                       value="{{$coach->address}}"
                @endif
            >

        </div>
    </div>
</div>
