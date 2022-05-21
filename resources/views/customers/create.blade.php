@extends('layouts.app')
@section('content')
    <div class="wrapper">


        <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create a new Customer</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        @include('forms.form_header')
        <form method="POST" action="{{ route('customers.store')}}" enctype="multipart/form-data">
        @csrf
        @include('forms.customer_form')
    </div>

@endsection
