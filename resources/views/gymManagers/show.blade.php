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
                                    <th>Name</th>
                                    <th>National ID</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($managers as $manager)
                                    @if(!$manager->trashed())
                                        <tr>
                                            <td>{{$manager->user_id}}</td>
                                            <td>{{$manager->user->name}}</td>
                                            <td>{{$manager->n_id}}</td>
                                            <td>
                                                <a role="button" href="{{route('edit_gymManger',[$manager->id])}}"
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
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <a role="button"
                                                   class="btn btn-warning m-1 d-inline-block restore"
                                                   data-id="{{$manager->id}}">
                                                    <i class="fas fa-redo"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
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
                let url = "{{route('gymManger.delete')}}" + `?id=${gymMangerId}`;
                let result = confirm('Are you sure you want to ban ?');
                if (result) {
                    let row = $(this).parent().parent();
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        success: function (result) {
                            if (result.success) {
                                console.log(row);
                                let newRow = `<tr>
                                            <td colspan="5" class="text-center">
                                                <a role="button"
                                                   class="btn btn-warning m-1 d-inline-block restore"
                                                   data-id="${gymMangerId}">
                                                    <i class="fas fa-redo"></i>
                                                </a>
                                            </td>
                                        </tr>`
                                row.remove();
                                $("tbody").append(newRow);
                            } else
                                alert(result.message);
                        }
                    });
                }
            });
        }

        sendRestoreRequest();

        function sendRestoreRequest() {
            $(document).on('click', '.restore', function (event) {
                event.preventDefault();
                let gymMangerId = this.getAttribute('data-id');
                let url = "{{route('gymManger.restore')}}" + `?id=${gymMangerId}`;
                let deleteUrl = "{{route('gymManger.delete')}}" + `?id=${gymMangerId}`;
                let result = confirm('Are you sure you want to unban ?');

                if (result) {
                    let row = $(this).parent().parent();
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        success: function (result) {
                            if (result.success) {
                                console.log(result);
                                let newRow = `
                                        <tr>
                                            <td>${gymMangerId}</td>
                                            <td>${result.manager.name}</td>
                                            <td>${result.manager.n_id}</td>
                                            <td>
                                                <a role="button" href="${deleteUrl}"
                                                   class="btn btn-primary m-1 d-inline-block"
                                                   data-id="${gymMangerId}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a role="button" class="btn btn-danger m-1 d-inline-block delete"
                                                   data-id="${gymMangerId}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>`
                                row.remove();
                                $("tbody").append(newRow);
                            } else
                                alert(result.message);
                        }
                    });
                }
            });
        }
    </script>
@endsection



