@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Latest Orders</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->


        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0" id="datatable" style="color: black;">
                    <thead>
                    <tr align="center">
                        <th>id</th>
                        <th>name</th>
                        <th>created at</th>
                        <th>cover image</th>
                        <th>City Manger</th>
                        <th>options</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    @foreach($gyms as $gym)--}}
                        <tr align="center">
                            <td>{{ $gym->id }}</td>
                            <td>{{ $gym->name }}</td>
                            <td><span class=" badge badge-success ">{{ $gym->created_at}}</span>
                            </td>
                            <td>
                                <img src="{{Storage::url($gym->cover_image)}}" alt="Cover image" class="img-fluid"
                                     width="120px" height="100px">
                            </td>

                            <td>
                                {{--                                {{App\Models\CityManager::where('city_id',$gym->city->id)->first()->user->name}}--}}
                                @dd(\App\Models\CityManager::all())
                                                                {{$gym->city->id}}
                            </td>

                            <td>
                                <a href="{{route('edit.gyms',$gym->id)}}" class="btn btn-primary m-1 d-inline-block"
                                   data-id="">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @can('permission_delete_Gym')
                                    <button class="delete  btn btn-danger m-1 d-inline-block" data-id="{{$gym->id}}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                    <script>
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
                    </script>
                    </tbody>

                </table>

                <script>
                    $(document).ready(function () {
                        $('#datatable').DataTable();
                    });
                </script>

@endsection
