@extends('themeAdminPanel')
@section('content')
    <h3>Записи клиентов на практики</h3>
    <table class="table table-striped">
        <tr>
            <td>Имя</td>
            <td>Номер</td>
            <td>Событие</td>
            <td>Дата</td>
            <td>Способ оплаты</td>
        </tr>
        @foreach($applications as $application)
        <tr>
            <td>{{$application->name}}</td>
            <td>{{$application->phone}}</td>
            <td>{{$application->event->name}}</td>
            <td>{{$application->date->translatedFormat('d M Y | H:i')}}</td>
            <td>{{$application->payment->name}}</td>
        </tr>
        @endforeach
    </table>
@endsection



{{--<img src="{{ $product->image_url }}" alt="">--}}

{{--            <td>{{date_format($events->date, 'd/m/y H:i')}}</td>--}}
