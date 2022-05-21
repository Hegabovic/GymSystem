@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                     width="60">
            </div>


            <!-- Content Wrapper. Contains page content -->
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add City Manager</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">add a city manager</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                                    @include('forms.clerk_form_header')
                                    <form method="post" action="{{route('edit_profile')}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                       @include('forms.clerk_form_core')
                                       @include('forms.cleck_form_extra_info')
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
                    <!-- /.row -->

                    <!-- Main row -->

                    <!-- /.row -->
                </div><!--/. container-fluid -->
            </section>
        </div>
    </div>
@endsection
