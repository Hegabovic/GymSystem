@extends('layouts.app') @section('content')

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
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Cover Image</th>
                        <th>City</th>
                        <th>Options</th>
                        <!-- <th>city manger name</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($gyms as $gym)
                        <tr>
                            <!-- <td><a href="pages/examples/invoice.html">OR9842</a></td> -->
                            <td>{{ $gym->id }}</td>
                            <td>{{ $gym->name }}</td>
                            <td>
                                <img class="img-fluid" style="max-height: 100px; max-width: 120px"
                                     src="{{Storage::url($gym->cover_image)}}" alt="Gym_Cover_Image">
                            </td>
                            <td>{{$gym->city->name}}</td>
                            <td>

                        <a  href="{{route('edit.gyms',$gym->id)}}" class="btn btn-primary m-1 d-inline-block" data-id="">
                                                <i class="fas fa-edit"></i>
                                            </a>
                      

                        @can('permission_delete_Gym')
                        <button class="delete  btn btn-danger m-1 d-inline-block" data-id="{{$gym->id}}">
                                                <i class="fas fa-trash-alt"></i>
                        @endcan
                     </button>
                        </td>
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
