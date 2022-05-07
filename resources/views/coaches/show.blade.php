@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">Coaches</div>
                        <div class="panel-body">
                            <table  class="table table-bordered" style="color: black" id="datatable">
                                <thead>

                                <tr>
                                    <th style="text-align: center;">ID</th>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Phone</th>
                                    <th style="text-align: center;">Address</th>
                                    <th style="text-align: center;">Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coaches as $coach)
                                    <tr>
                                        <td style="text-align: center;">{{$coach->id}}</td>
                                        <td style="text-align: center;">{{$coach->name}}</td>
                                        <td style="text-align: center;">{{$coach->phone}}</td>
                                        <td style="text-align: center;">{{$coach->address}}</td>
                                        <td style="text-align: center;">
                                            <a role="button" href="{{route('update_coach',[$coach->id])}}"
                                               class="btn btn-primary m-1 d-inline-block"
                                               data-id="{{$coach->id}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a role="button" class="btn btn-danger m-1 d-inline-block delete"
                                               data-id="{{$coach->id}}">
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
                let coachId = this.getAttribute('data-id');
                let url = "{{route('coach.delete')}}" + `?id=${coachId}`;
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



