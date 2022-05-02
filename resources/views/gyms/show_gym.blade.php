@extends('layouts.app') @section('content')

<div class="card">
    <div class="card-header border-transparent">
        <h3 class="card-title">Latest Orders</h3>

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
                        <th>name</th>
                        <th>created at</th>
                        <th>cover image</th>
                        <!-- <th>city manger name</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($gymes as $gym)
                    <tr>
                        <!-- <td><a href="pages/examples/invoice.html">OR9842</a></td> -->
                        <td value="{{$gym->id}}">{{ $gym->name }}</td>
                        <td value="{{$gym->id}}"><span class=" badge badge-success ">{{ $gym->created_at}}</span></td>
                        <td>
                            <div value="{{$gym->id}}" class="sparkbar " data-color="#00a65a " data-height="20 ">
                                {{ $gym->cover_image }}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>


            @endsection
