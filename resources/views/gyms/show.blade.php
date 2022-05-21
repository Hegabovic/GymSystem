@extends('layouts.app')
@section('content')
    <div class="container-fluid p-5">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show Gyms</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class=" breadcrumb-item active">Show Gyms
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table table-bordered text-center" id="datatable" style="color: black;">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>created at</th>
                                    <th>cover image</th>
                                    <th>City Manger</th>
                                    <th>options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($gyms as $gym)
                                    <tr>
                                        <td>{{ $gym->id }}</td>
                                        <td>{{ $gym->name }}</td>
                                        <td>
                                            <span class="badge badge-warning">
                                                {{ $gym->created_at->format("d-m-Y h:iA")}}
                                            </span>
                                        </td>
                                        <td>
                                            <img src="{{Storage::url($gym->cover_image)}}" alt="Cover image"
                                                 class="img-fluid table-img img-circle img-thumbnail"
                                                 width="120px" height="100px">
                                        </td>

                                        <td>
                                            @if($gym->city->cityManager && $gym->city)
                                                {{$gym->city->CityManager->user->name}}
                                            @else
                                                {{"Tanjero"}}
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{route('edit.gyms',$gym->id)}}"
                                               class="btn btn-primary m-1 d-inline-block"
                                               data-id="">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @can('permission_delete_Gym')
                                                <button class="delete  btn btn-danger m-1 d-inline-block"
                                                        data-id="{{$gym->id}}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#datatable').DataTable();

                function sendDeleteRequest() {
                    $(document).on('click', '.delete', function () {
                        let gymId = this.getAttribute('data-id');
                        let url = "{{route('gym.delete')}}" + `?id=${gymId}`;

                        let result = confirm('Are you sure you want to delete ?');
                        if (result) {
                            let row = $(this).parent().parent();
                            $(this).parent().parent().css("background-color", "grey");

                            $.ajax({
                                url: url,
                                type: 'DELETE',
                                contentType: 'application/json',
                                success: function (result) {
                                    if (result.success) {
                                        row.remove();
                                    } else {
                                        alert(result.message);
                                    }
                                }
                            });
                        }
                    });
                }

                sendDeleteRequest();

            });
        </script>
@endsection
