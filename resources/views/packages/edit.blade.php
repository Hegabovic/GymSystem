@extends('layouts.app')
@section('content')

        <form method="post" action="{{route('packages.update',$package->id)}}">
        @csrf
        @method('put')
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input name="name" value="{{ $package['name'] }}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Price</label>
            <input name="price" value="{{ $package['price'] }}" type="number" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Number of sessions</label>
            <input name="number_of_sessions" value="{{ $package['number_of_sessions'] }}" type="number" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>


           @can('permission_edit_package_price')
          <button class="btn btn-success">Update</button>
          @endcan
        </form>

    </div>

    @if($errors->any())
        <div class="m-auto text-center">
            @foreach($errors->all() as $error)
                <li style="color: red;list-style: none"><strong>{{$error}}</strong></li>
            @endforeach
        </div>
    @endif
@endsection
