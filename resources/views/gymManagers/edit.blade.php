@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Gym Manager</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit {{$gymManager->user->name}}</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            {{--            <section class="content">--}}
            {{--                <div class="container-fluid">--}}
            {{--                    <!-- Info boxes -->--}}

            {{--                    <!-- /.row -->--}}

            {{--                    <div class="row">--}}
            {{--                        <div class="col-md-12">--}}
            {{--                            <form method="post"--}}
            {{--                                  action="{{route('store_updated_gymManger',['id'=> $manger->user_id])}}"--}}
            {{--                                  enctype="multipart/form-data">--}}
            {{--                                @csrf--}}
            {{--                                @method('PUT')--}}

            {{--                                <div class="card-body">--}}

            {{--                                    <div class="form-group">--}}
            {{--                                        <label for="exampleInputEmail1">Name</label>--}}
            {{--                                        <input type="text" class="form-control" id="exampleInputEmail1"--}}
            {{--                                               value="{{$manger->user->name}}" name="name">--}}
            {{--                                    </div>--}}

            {{--                                    <div class="form-group">--}}
            {{--                                        <label for="NationalId">National Id</label>--}}
            {{--                                        <input type="text" class="form-control" id="NationalId"--}}
            {{--                                               value="{{$manger->n_id}}" name="n_id" pattern="[0-9]{14}">--}}
            {{--                                    </div>--}}

            {{--                                    <div class="form-group">--}}
            {{--                                        <label for="Email">Email address</label>--}}
            {{--                                        <input type="email" class="form-control" id="Email"--}}
            {{--                                               value="{{$manger->user->email}}" name="email">--}}
            {{--                                    </div>--}}

            {{--                                    <div class="form-group">--}}
            {{--                                        <label for="exampleInputFile">Profile Picture</label>--}}
            {{--                                        <input class="form-control" type="file" id="avatar_input" name="avatar"--}}
            {{--                                               value="{{$manger->user->avatar_path}}">--}}
            {{--                                    </div>--}}
            {{--                                    <div>--}}
            {{--                                        <img class="img-fluid" width="120px" height="100px"--}}
            {{--                                             alt="Profile-Picture"--}}
            {{--                                             src="{{Storage::url($manger->user->avatar_path)}}">--}}
            {{--                                    </div>--}}

            {{--                                    <div class="form-group">--}}
            {{--                                        <label for="Gym">Gym</label>--}}
            {{--                                        <select name="gym_id" id="Gym" class="form-control">--}}
            {{--                                            @foreach($gyms as $gym)--}}
            {{--                                                @if($manger->gym_id === $gym->id)--}}
            {{--                                                    <option selected value="{{$gym->id}}">{{$gym->name}}</option>--}}
            {{--                                                @else--}}
            {{--                                                    <option value="{{$gym->id}}">{{$gym->name}}</option>--}}
            {{--                                                @endif--}}
            {{--                                            @endforeach--}}
            {{--                                        </select>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="card-footer">--}}
            {{--                                    <button type="submit" class="btn btn-primary">Submit</button>--}}
            {{--                                </div>--}}
            {{--                            </form>--}}
            {{--                            <!-- /.card -->--}}

            {{--                        </div>--}}
            {{--                        <!-- /.col -->--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </section>--}}
            @include('forms.form_header')
            <form method="post"
                  action="{{route('store_updated_gymManger',['id'=> $gymManager->user_id])}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('forms.form_core')
                <div class="row mt-3">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="city-input">Gym</label>
                            <select name="facility" id="city-input" class="form-control">
                                @foreach($gyms as $gym)
                                    <option value="{{$gym->id}}">{{$gym->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
            @include('forms.form_footer')

        </div>

    </div>
@endsection
