@extends('layouts.app')
@section('content')
    @include('forms.gym_form_header')
    <form method="post" action="{{ route('store_gyms',$gym->id) }}" enctype="multipart/form-data">
        @csrf
        @method("put")
    @include('forms.gym_form_core')
    @include('forms.form_footer')

@endsection
