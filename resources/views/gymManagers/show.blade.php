@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">Gyms Mangers</div>
                        <div class="panel-body">
                            <table class="table table-bordered" style="color: black;" id="datatable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>National ID</th>
                                    <th>Gym</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($managers as $manager)
                                    <tr>
                                        <td>{{$manager->user_id}}</td>
                                        <td>{{$manager->user->name}}</td>
                                        <td>{{$manager->gym->name}}</td>
                                        <td>
                                            <a role="button" href="{{route('update_coach',[$manager->id])}}"
                                               class="btn btn-primary m-1 d-inline-block"
                                               data-id="{{$manager->id}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a role="button" class="btn btn-danger m-1 d-inline-block delete"
                                               data-id="{{$manager->id}}">
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
                let gymMangerId = this.getAttribute('data-id');
                let url = "{{route('coach.delete')}}" + `?id=${gymMangerId}`;
                let result = confirm('Are you sure you want to delete ?');
                if (result) {
                    let row = $(this).parent().parent();
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        success: function (result) {
                            if (result.success)
                                row.remove();
                            else
                                alert(result.message);
                        }
                    });
                }
            });
        }

    </script>
@endsection



