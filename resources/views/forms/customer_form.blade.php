<div class="row mt-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" class="form-control" id="exampleInputEmail1"
                   placeholder="Enter name" name="name"
                   @if(isset($customer))
                       value="{{$customer->user->name}}"
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
                   @if(isset($customer))
                       value="{{$customer->user->email}}"
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
<div class="row mt-3">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
            <input name="birth_date" type="date" class="form-control" id="exampleFormControlInput1"
                   placeholder=""
                   @if(isset($customer))
                       value="{{$customer->birth_date}}"
                @endif
            >
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Gender</label>
            <select name="gender" class="form-select" aria-label="Default select example">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
    </div>
</div>
@if(! isset($customer))
    @include('forms.form_extra_info')
@endif




@include('forms.form_footer')


