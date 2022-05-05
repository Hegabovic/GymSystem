@extends('layouts.app')
@section('content')


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">Packages</div>
                        <div class="panel-body">
                            <table class="table table-bordered" style="color: black;" id="datatable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Number of sessions</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($packages as $package)   
            
            <tr>
                <td>{{$package->id }} </td>
              <td>{{ $package->name }}</th>
              <td>{{ $package->toDollar()}}</td>
              <td>{{ $package->number_of_sessions}}</td>
              <td>
                                            <a role="button" href="{{route('packages.edit',[$package->id])}}"
                                               class="btn btn-primary m-1 d-inline-block"
                                               data-id="{{$package->id}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                            <a role="button" class="btn btn-danger m-1 d-inline-block delete"
                                               data-id="{{$package->id}}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a> 
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
    </div>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });

        sendDeleteRequest();

        function sendDeleteRequest() {
            $(document).on('click', '.delete', function (event) {
                event.preventDefault();
                let packageId = this.getAttribute('data-id');
                let url = "{{route('packages.delete')}}" + `?id=${packageId}`;

                let result = confirm('Are you sure you want to delete ?');
                console.log(url);
                if (result) {
                    let row = $(this).parent().parent();
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        success: function (result) {
                            
                            if (result.success) {
                                row.remove();
                                console.log(result.count);
                            }
                                alert(result.message);
                        }
                    });
                }
            });
            
        }

    </script>
            @endsection
            