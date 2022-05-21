@extends('layouts.app')
@section('content')

    <div class="container-fluid p-5">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show Cities</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Show Cities</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table id="dataTable" class="table table-bordered text-center" style="color: black">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>City Name</th>
                        <th>Number of Gyms</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cities as $city)
                        <tr>
                            <td>{{$city->id}}</td>
                            <td>{{$city->name}}</td>
                            <td>{{$city->gyms->count()}}</td>
                            <td>
                                <button class="btn btn-danger delete" id="{{$city->id}}"><i
                                        class="fas fa-trash-alt"></i>
                                </button>
                                <a href="{{ route('city.edit',  $city->id) }}" class="btn btn-primary edit"><i
                                        class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tbody>
                </table>
            </div>
        </div>

        <script>
            $(document).ready(function () {

                $('#dataTable').DataTable();

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
            });
        </script>
@endsection

