@extends('theme')
@section('content')
    <h1>Событие: {{$event->name}}</h1>
    <p>Описание: {{$event->description}}</p>
@endsection
