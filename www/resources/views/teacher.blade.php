@extends('theme')
@section('content')
    <h1>{{$teacher->name}}</h1>
    <h3>{{$teacher->status}}</h3>
    <p>Описание: {{$teacher->description}}</p>
@endsection

