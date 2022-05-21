@extends('layouts.app')
@section('content')

    <div class="container-fluid p-5">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show Customers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class=" breadcrumb-item active">Show Customers
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
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <th>Profile Image path</th>
                                    <th>Last Login</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($customers as $customer)

                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->user->name}}</td>
                                        <td>{{ $customer->user->email}}</td>
                                        <td>{{ $customer->birth_date }}</td>
                                        <td>{{ $customer->gender }}</td>
                                        <td>{{ $customer->user->avatar_path}}</td>
                                        <td>{{ $customer->getLastLoginAtAttribute()}}</td>
                                        <td>
                                            <a role="button" href="{{route('customers.edit',[$customer->id])}}"
                                               class="btn btn-primary m-1 d-inline-block" data-id="{{$customer->id}}">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a role="button" class="btn btn-danger m-1 d-inline-block delete"
                                               data-id="{{$customer->id}}">
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
                let customerId = this.getAttribute('data-id');
                let url = "{{route('customers.delete')}}" + `?id=${customerId}`;

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
                            } else {
                                alert(result.message);
                            }
                        }
                    });
                }
            });

        }
    </script>
@endsection
