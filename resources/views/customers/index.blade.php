@extends('layouts.app')
@section('content')


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">Customers</div>
                        <div class="panel-body">
                            <table class="table table-bordered" style="color: black;" id="datatable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Profile Image path</th>
                        <th>User Id</th>
                        <th>Last Login</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($customers as $customer)   
            
            <tr>
              <td>{{$customer->id }}</td>
              <td>{{ $customer->birth_date }}</td>
              <td>{{ $customer->gender }}</td>
              <td>{{ $customer->avatar_path}}</td>
              <td>{{ $customer->user_id}}</td>
              <td>{{ $customer->getLastLoginAtAttribute()}}</td>
              <td> 
              <a role="button" href="{{route('customers.edit',[$customer->id])}}"
                                               class="btn btn-primary m-1 d-inline-block"
                                               data-id="{{$customer->id}}">
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
        
    </script>
            @endsection
            