@extends('layouts.app')
@section('content')
    @include('forms.forms_without_logo_leader')
    <form method="post" action="{{route('packages.update',$package->id)}}">
        @csrf
        @method('put')
    @include('forms.package_form_core')
    @include('forms.form_footer')
@endsection
