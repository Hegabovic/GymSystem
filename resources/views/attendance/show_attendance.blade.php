{{-- <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>

<table id="example" >
    {{-- class="table table-striped table-bordered" --}}

    {{-- <thead>
        <tr>
            <th>user name</th>
            <th>email</th>
            <th>training session name</th>
            <th>attendance time</th>
            <th>attendance date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
           <td>adham</td>
        </tr>
    <tbody>
     --}}
{{-- </table>

<script>
   $(document).ready(function() {
    $('#example').DataTable();
} );
   </script> --}}


   @extends('layouts.app')
@section('content')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
{{-- <script src="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script> --}}
{{-- <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> --}}
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>


        <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard v2</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->

                <!-- /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Attendances</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-tool dropdown-toggle"
                                                data-toggle="dropdown">
                                            <i class="fas fa-wrench"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <a href="#" class="dropdown-item">Action</a>
                                            <a href="#" class="dropdown-item">Another action</a>
                                            <a href="#" class="dropdown-item">Something else here</a>
                                            <a class="dropdown-divider"></a>
                                            <a href="#" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <!-- ./card-body -->
            {{-- <script src="../../plugins/datatables/jquery.dataTables.min.js"></script> --}}
            {{-- <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script> --}}

            <table id="example" class="table table-bordered" style="color: black">
                 <thead>
                    <tr>
                        <th>Id</th>
                        <th>user name</th>
                        <th>email</th>
                        <th>training session name</th>
                        <th>attendance date</th>
                        <th>attendance time</th>
                        <th>Gym</th>
                        <th>City</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $table)
                    @if ( ! $table->trashed())
                    <tr>
                        <td>{{$table->id}}</td>
                        <td>{{$table->customer->user->name}}</td>
                        <td>{{$table->customer->user->email}}</td>
                        <td>{{$table->training_session->name}}</td>

                        @if($table->created_at)
                        <td>{{$table->created_at->toDateString() }}</td>
                        @endif

                        @if($table->created_at)
                        <td>{{$table->created_at->format('H:i')}}</td>
                        @endif
                        <td>{{$table->gym->name}}</td>
                        <td>{{$table->gym->city->name}}</td>
                        <td><button class="btn btn-primary delete" id="{{$table->id}}">Delete</button></td>
                    </tr>
                    {{-- @endif --}}
                    @else
                {{-- <tr align="center">
                    <th scope="col">-</th>
                    <th scope="col">-</th>
                    <th scope="col">-</th>
                    <th scope="col">-</th>
                    <th scope="col">-</th>
                    <th scope="col">-</th>
                    <th scope="col">-</th>
                    <th scope="col">-</th>
                    <th scope="col">-</th>

                    <td  align="center">
                        <form method="post" action="{{ route('attendance.restore', ['id' => $table->id])}}">
                            @csrf
                            @method('put')
                            <button type="submit"  class="btn btn-warning"><i class="bi bi-pencil-square"></i> Restore</button>
                            <input name="id" type="hidden" value="{{ $table->id }}">
                        </form>
                    </td>
                </tr> --}}
            @endif
                    @endforeach

                    <script >
                     $(document).on('click', '.delete', function() {
                        $confirm=confirm('Are you sure you want to delete ?');
                        if($confirm)
                        {
                            let myThis=$(this).parent().parent()
                            $(this).parent().parent().css("background-color", "grey");

                            let Attendance_id=this.id;
                            $.ajax({
                                url: "{{route('delete.attendances')}}"+`?id=${Attendance_id}`,
                                type: 'DELETE',
                                contentType: 'application/json',
                                data: `{"id":"${Attendance_id}"}`,
                                success: function(result) {
                                    myThis.remove();
                                }
                            });


                        }
                    });
                    </script>

                <tbody>


             </table>


             <script>
                $(document).ready(function() {
                 $('#example').DataTable();
             } );
                </script>



             <!-- ./card-body done-->
{{--
<script>
   $(document).ready(function() {
    $('#example').DataTable();
} );
   </script>  --}}



                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Main row -->

                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
    </div>
@endsection
