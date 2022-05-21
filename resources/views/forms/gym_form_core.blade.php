
<div class="row mt-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" class="form-control" id="exampleInputEmail1"
                   placeholder="Enter name" name="name"
                   @if(isset($gym))
                       value="{{$gym->name}}"
                @endif
            >
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">

        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="form-label "> Cover image</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" id="avatar_input" name="cover_image">
                    <label class="custom-file-label" for="avatar_input">Choose file</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">

        <div class="form-group">
            <label for="city-input">City</label>
            <select name="city_id" id="city-input" class="form-control">
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>

    </div>
</div>
