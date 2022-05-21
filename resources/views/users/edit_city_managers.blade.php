@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard v2</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @include('forms.clerk_form_header')
        <form method="POST"
              action="{{route('update-city-managers',['id'=>$cityManager->id])}}"
              enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('forms.clerk_form_core')
            <div class="row mt-3">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="city-input">City</label>
                        <select name="facility" id="city-input" class="form-control">
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
        @include('forms.clerk_form_footer')

    </div>
@endsection

