@extends('layouts.app')
@section('content')
    <div class="container-fluid p-5">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show Cities Managers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Show Cities Managers</li>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>National Id</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cityManagers as $cityManager)
                        <tr>
                            <td>{{$cityManager->id}}</td>
                            <td>{{$cityManager->user->name}}</td>
                            <td>{{$cityManager->user->email}}</td>
                            <td>{{$cityManager->n_id}}</td>

                            <td>
                                <button class="btn btn-danger delete" id="{{$cityManager->id}}"><i
                                        class="fas fa-trash-alt"></i></button>
                                <a href="{{ route('edit-city-managers',  $cityManager->id) }}"
                                   class="btn btn-primary edit"><i class="fas fa-edit"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
            $(document).on('click', '.delete', function () {
                let attend = confirm('Are you sure you want to delete ?');
                if (attend) {
                    let myThis = $(this).parent().parent()
                    $(this).parent().parent().css("background-color", "grey");

                    let Attendance_id = this.id;
                    $.ajax({
                        url: "{{route('delete-city-managers')}}" + `?id=${Attendance_id}`,
                        type: 'DELETE',
                        contentType: 'application/json',
                        data: `{"_token": "{{ csrf_token() }}", "id":"${Attendance_id}"}`,
                        success: function (result) {
                            myThis.remove();
                        }
                    });
                }
            });
        });
    </script>

@endsection

