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
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Attendances</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-tool dropdown-toggle"
                                                data-toggle="dropdown">
                                            <i class="fas fa-wrench"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <a href="#" class="dropdown-item">Action</a>
                                            <a href="#" class="dropdown-item">Another action</a>
                                            <a href="#" class="dropdown-item">Something else here</a>
                                            <a class="dropdown-divider"></a>
                                            <a href="#" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <table id="example" class="table table-bordered" style="color: black">
                                <thead>
                                <tr align="center">
                                    <th>Id</th>
                                    <th>City Name</th>
                                    <th>attendance date</th>
                                    <th>attendance time</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($cities as $city)

                                    <tr align="center">
                                        <td>{{$city->id}}</td>
                                        <td>{{$city->name}}</td>

                                        @if($city->created_at)
                                            <td>{{ $city->created_at->toDateString() }}</td>
                                        @endif

                                        @if($city->created_at)
                                            <td>{{$city->created_at->format('H:i')}}</td>
                                        @endif

                                        <td>
                                            <button class="btn btn-danger delete" id="{{$city->id}}"><i class="fas fa-trash-alt"></i>
                                            </button>
                                            <a href="{{ route('city.edit',  $city->id) }}" class="btn btn-primary edit"><i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                <script>
                                    function sendDeleteRequest() {
                                        $(document).on('click', '.delete', function (event) {
                                            event.preventDefault();
                                            let cityID = this.id;
                                            let url = "{{route('delete.city')}}" + `?id=${cityID}`;
                                            let result = confirm('Are you sure you want to delete ?');
                                            if (result) {
                                                let row = $(this).parent().parent();
                                                $.ajax({
                                                    url: url,
                                                    type: 'DELETE',
                                                    success: function (result) {
                                                        if (result.success)
                                                            row.remove()
                                                        else
                                                            alert(result.msg)
                                                    }
                                                });
                                            }
                                        });
                                    }
                                    sendDeleteRequest()
                                </script>
                                <tbody>
                            </table>
                            <script>
                                $(document).ready(function () {
                                    $('#example').DataTable();
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <
        </section>
    </div>
@endsection

