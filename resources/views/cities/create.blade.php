@extends('layouts.app')
@section('content')
    @include('forms.forms_without_logo_leader')
            <form action="{{ route('store_city') }}" method="post">
                @csrf
                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cityName">City Name</label>
                            <input type='text' class="form-control" name="cityName" id="cityName"
                                   placeholder="Enter city name">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

               @include('forms.form_footer')
@endsection
