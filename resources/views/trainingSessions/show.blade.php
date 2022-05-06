@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">Training Sessions</div>
                        <div class="panel-body">
                            <table class="table table-bordered" style="color: black;" id="datatable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Start at</th>
                                    <th>Finish At</th>
                                    <th>Coach</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trainingSessions as $trainingSession)
                                    <tr>
                                        <td>{{$trainingSession->id}}</td>
                                        <td>{{$trainingSession->name}}</td>
                                        <td>{{$trainingSession->start_at->format('d-m-Y h:iA')}}</td>
                                        <td>{{$trainingSession->finish_at->format('d-m-Y h:iA')}}</td>
                                        <td>
                                            <div class="mb-3">
                                                <label for="coach" class="form-label">city</label>
                                                <select id="coach" name="coach_id" class="form-control">
                                                    @foreach ($coaches as $coach)
                                                        <option value="{{ $coach->id }}"> {{ $coach->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a role="button"
                                               href="{{route('update_trainingSession',[$trainingSession->id])}}"
                                               class="btn btn-primary m-1 d-inline-block"
                                               data-id="{{$trainingSession->id}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a role="button" class="btn btn-danger m-1 d-inline-block delete"
                                               data-id="{{$trainingSession->id}}">
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
                let trainingSessionId = this.getAttribute('data-id');
                let url = "{{route('trainingSession.delete')}}" + `?id=${trainingSessionId}`;

                let result = confirm('Are you sure you want to delete ?');
                if (result) {
                    let row = $(this).parent().parent();
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        success: function (response) {
                            console.log(response);
                            if (response.success) {
                                row.remove();
                            } else
                                alert(response.message);
                        }
                    });
                }
            });
        }

    </script>
@endsection



