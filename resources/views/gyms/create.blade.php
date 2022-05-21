@extends('layouts.app')

@section('content')
    @include('forms.gym_form_header')
    <form method="POST" action="{{ route('store_gym')}}" enctype="multipart/form-data">
        @csrf
       @include('forms.gym_form_core')
    @include('forms.form_footer')
@endsection
