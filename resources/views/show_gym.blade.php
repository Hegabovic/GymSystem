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

    <form action="{{route('show_gym')}}" method="post">
        @crf
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

                    <tr>
                        <!-- <td><a href="pages/examples/invoice.html ">OR1848</a></td> -->
                        <td>Samsung Smart TV</td>
                        <td><span class="badge badge-warning ">Pending</span></td>
                        <td>
                            <div class="sparkbar " data-color="#f39c12 " data-height="20 ">
                                90,80,-90,70,61,-83,68
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <!-- <td><a href="pages/examples/invoice.html ">OR7429</a></td> -->
                        <td>iPhone 6 Plus</td>
                        <td><span class="badge badge-danger ">Delivered</span></td>
                        <td>
                            <div class="sparkbar " data-color="#f56954 " data-height="20 ">
                                90,-80,90,70,-61,83,63
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <!-- <td><a href="pages/examples/invoice.html ">OR7429</a></td> -->
                        <td>Samsung Smart TV</td>
                        <td><span class="badge badge-info ">Processing</span></td>
                        <td>
                            <div class="sparkbar " data-color="#00c0ef " data-height="20 ">
                                90,80,-90,70,-61,83,63
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <!-- <td><a href="pages/examples/invoice.html ">OR1848</a></td> -->
                        <td>Samsung Smart TV</td>
                        <td><span class="badge badge-warning ">Pending</span></td>
                        <td>
                            <div class="sparkbar " data-color="#f39c12 " data-height="20 ">
                                90,80,-90,70,61,-83,68
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <!-- <td><a href="pages/examples/invoice.html ">OR7429</a></td> -->
                        <td>iPhone 6 Plus</td>
                        <td><span class="badge badge-danger ">Delivered</span></td>
                        <td>
                            <div class="sparkbar " data-color="#f56954 " data-height="20 ">
                                90,-80,90,70,-61,83,63
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <!-- <td><a href="pages/examples/invoice.html ">OR9842</a></td> -->
                        <td>Call of Duty IV</td>
                        <td><span class="badge badge-success ">Shipped</span></td>
                        <td>
                            <div class="sparkbar " data-color="#00a65a " data-height="20 ">
                                90,80,90,-70,61,-83,63
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
</form>

            @endsection
