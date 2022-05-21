@extends('layouts.app')
@section('content')
    @include('forms.forms_without_logo_header')
    <form method="POST" action="{{ route('packages.store')}}">
    @csrf
    @include('forms.package_form_core')
    @include('forms.form_footer')
@endsection
