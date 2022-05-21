<div class="row mt-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" class="form-control" id="exampleInputEmail1"
                   placeholder="Enter name" name="name"
            @if(isset($cityManager))
                value="{{$cityManager->user->name}}"
            @elseif(isset($gymManager))
                       value="{{$gymManager->user->name}}"
                @endif
            >
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">national Id</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter National ID" name="n_id"
                   pattern="[0-9]{14}"
                   @if(isset($cityManager))
                       value="{{$cityManager->n_id}}"
                   @elseif(isset($gymManager))
                       value="{{$gymManager->n_id}}"
                @endif
            >
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1"
                   placeholder="Enter email" name="email"
                   @if(isset($cityManager))
                       value="{{$cityManager->user->email}}"
                   @elseif(isset($gymManager))
                       value="{{$gymManager->user->email}}"
                @endif
            >
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">

        <div class="form-group">
            <label for="exampleInputFile">avatar image</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" id="avatar_input" name="avatar">
                    <label class="custom-file-label" for="avatar_input">Choose file</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                </div>
            </div>
        </div>
    </div>
</div>
