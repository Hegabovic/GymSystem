@extends('layouts.app')
@section('content')
    @include('forms.forms_without_logo_header')
        <form method="post" action="{{route("store_coach")}}">
            @csrf
           @include('forms.coaches_form_core')
    @include('forms.form_footer')
@endsection
