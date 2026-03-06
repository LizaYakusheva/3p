@extends('theme')
@section('content')
    <h1>{{$subscription->name}}</h1>
    <p>Описание: {{$subscription->description}}</p>
@endsection
