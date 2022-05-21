@extends('layouts.app')
@section('content')
    @include('forms.forms_without_logo_header')
    <form method="post" action="{{route("store_trainingSession")}}">
        @csrf
        @include('forms.sessions_form_core')
        @include('forms.form_footer')
        @if($isOverlap)
            <div class="m-auto text-center">
                <li style="color: red;list-style: none">
                    <strong>session time is overlapped with other session</strong>
                </li>
            </div>
    @endif

@endsection
