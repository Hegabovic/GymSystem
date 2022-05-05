
@extends('layouts.app')
@section('content')
 <form method="POST" action="{{ route('store.gyms'), 'gyms' => $gyms['id'] }}">
        @method('PUT')
        @csrf
        <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">name</label>
                <div name="name" class="form-control">

                @foreach ($gyms as $gym)
                <input value="{{$gym->id}}"> {{ $gym->name }} </input>
                @endforeach
                </div>

        </div>

        <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">created at</label>
                <div name="created_at" class="form-control">

                @foreach ($gyms as $gym)
                <input value="{{$gym->id}}"> {{ $gym->created_at }} </input>
                @endforeach
                </div>

        </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">cover image</label>
                <div name="cover_image" class="form-control">

                @foreach ($gyms as $gym)
                <input value="{{$gym->id}}"> {{ $gym->cover_image }} </input>
                @endforeach
                </div>

            </div>

          <button class="btn btn-success">Update</button>
</form>
@section('content')

