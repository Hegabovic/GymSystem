@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">edit profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                        <img src="{{Storage::url(Auth::user()->avatar_path)}}" class="rounded-circle mt-5" alt="User Image" style="width: 200px;height: 200px">

                    <span class="font-weight-bold">{{Auth::user()->name}}</span>
                    <span class="text-black-50">{{Auth::user()->email}}</span>
                </div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                            <h6>Back to home</h6>
                        </div>
                        <h6 class="text-right">Edit Profile</h6>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{route('edit_profile')}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="name" value="{{Auth::user()->name}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{Auth::user()->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Re Enter Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="ReTypePassword" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                        <div class="row mt-3">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="exampleInputFile">avatar image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file"  id="avatar_input" name="avatar">
                                        <label class="custom-file-label" for="avatar_input">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
