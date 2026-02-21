@extends('theme')
@section('content')
    <h1>{{$course->name}}</h1>
    <p>Описание: {{$course->description}}</p>
@endsection
