@extends('layouts.app')
@section('content')


<div class="card">
    <div class="card-header border-transparent">
        <h3 class="card-title">All Packages</h3>

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
            <table class="table m-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Number of sessions</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($packages as $package)   
            
            <tr>
              <td>{{ $package->name }}</th>
              <td>{{ $package->toDollar()}}</td>
              <td>{{ $package->number_of_sessions}}</td>
              <td>
              <a href="{{route('packages.edit', ['package'=>$package->id])}}" class="btn btn-primary">Edit</a>
              <a href=# class="btn btn-danger">Delete</a>
              </td>
              </tr>
                    @endforeach
            
                </tbody>

            </table>
            @endsection
            