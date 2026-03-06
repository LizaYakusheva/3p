@extends('theme')
@section('content')
    <h1>{{$product->name}}</h1>
    <p>Описание: {{$product->description}}</p>
@endsection
