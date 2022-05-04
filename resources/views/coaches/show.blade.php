@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Coaches</div>

                        <div class="panel-body">
                            <table class="table table-bordere" style="color: black;" id="datatable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coaches as $coach)
                                    <tr>
                                        <td>{{$coach->id}}</td>
                                        <td>{{$coach->name}}</td>
                                        <td>{{$coach->phone}}</td>
                                        <td>{{$coach->address}}</td>
                                        <td>
                                            <button class="btn btn-primary m-1 d-inline-block" data-id="{{$coach->id}}">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger m-1 d-inline-block" data-id="{{$coach->id}}">
                                                Delete
                                            </button>
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
    </script>
@endsection



