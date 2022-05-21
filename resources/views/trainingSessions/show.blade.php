@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container-fluid p-5">
            <div class="content-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Show Training Sessions</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class=" breadcrumb-item active">Show Training Sessions
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table class="table table-bordered" style="color: black;" id="datatable">
                                    <thead>
                                    <tr align="center">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Start at</th>
                                        <th>Finish At</th>
                                        <th>Coaches</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($trainingSessions as $trainingSession)
                                        <tr align="center">
                                            <td style="vertical-align: middle">{{$trainingSession->id}}</td>
                                            <td style="vertical-align: middle">{{$trainingSession->name}}</td>
                                            <td style="vertical-align: middle">{{$trainingSession->start_at->format('d-m-Y h:iA')}}</td>
                                            <td style="vertical-align: middle">{{$trainingSession->finish_at->format('d-m-Y h:iA')}}</td>
                                            <td style="vertical-align: middle">
                                                <table class="table">
                                                    <tr align="center">
                                                        <td style="vertical-align: middle">
                                                            @if($trainingSession->sessionsCoaches->count() > 0)
                                                                @foreach ($trainingSession->sessionsCoaches as $sessionCoach)
                                                                    <option
                                                                        value="{{ $sessionCoach->coach_id }}"> {{ \App\Models\Coach::find($sessionCoach->coach_id)->name }}
                                                                    </option>
                                                                @endforeach
                                                            @else
                                                                ------------
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="vertical-align: middle">
                                                <a role="button"
                                                   href="{{route('update_trainingSession',[$trainingSession->id])}}"
                                                   class="btn btn-primary m-1 d-inline-block"
                                                   data-id="{{$trainingSession->id}}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @can('permission_delete_trainingSession')
                                                    <a role="button" class="btn btn-danger m-1 d-inline-block delete"
                                                       data-id="{{$trainingSession->id}}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
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
