@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add Gym Manager</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">add a gym manager</li>
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
            {{--                            @if ($errors->any())--}}
            {{--                                <div class="alert alert-danger">--}}
            {{--                                    <ul>--}}
            {{--                                        @foreach ($errors->all() as $error)--}}
            {{--                                            <li>{{ $error }}</li>--}}
            {{--                                        @endforeach--}}
            {{--                                    </ul>--}}
            {{--                                </div>--}}
            {{--                            @endif--}}
            {{--                            <form method="post" action="{{route('store_clerk',['clerk'=>'gym-manager'])}}"--}}
            {{--                                  enctype="multipart/form-data">--}}
            {{--                                @csrf--}}
            {{--                                <div class="card-body">--}}
            {{--                                    @include('forms.create_clerk_form')--}}
            {{--                                    <div class="form-group">--}}
            {{--                                        <label for="gym-input">gym</label>--}}
            {{--                                        <select name="facility" id="gym-input" class="form-control">--}}
            {{--                                            @foreach($gyms as $gym)--}}
            {{--                                                <option value="{{$gym->id}}">{{$gym->name}}</option>--}}
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
            {{--                    <!-- /.row -->--}}

            {{--                    <!-- Main row -->--}}

            {{--                    <!-- /.row -->--}}
            {{--                </div><!--/. container-fluid -->--}}
            {{--            </section>--}}
            @include('forms.form_header')
            <form method="post" action="{{route('store_clerk',['clerk'=>'gym-manager'])}}"
                  enctype="multipart/form-data">
                @csrf
                @include('forms.form_core')
                @include('forms.form_extra_info')
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
