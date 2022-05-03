@extends('layouts.app')
@section('content')
    <div class="wrapper">
        @foreach($coaches as $coach)
            <h1>{{$coach}}</h1>
        @endforeach
        {{$coaches->links()}}
    </div>
@endsection
