@extends('themeAdminPanel')
@section('content')
    <h3>События студии "ГОНГ"</h3>
    <a href="{{route('events.create')}}" class="btn btn-primary">Добавить</a>
    <table class="table table-striped">
        <tr>
            <td>Фото</td>
            <td>Название</td>
            <td>Описание</td>
            <td>Тип события</td>
            <td>Цена</td>
            <td>Преподаватель</td>
            <td>Дата события</td>
            <td>Длительность занятия</td>
            <td></td>
            <td></td>
        </tr>
        @foreach($events as $event)
            <tr>
                <td><img src="{{ $event->image ? Storage::disk('public')->url($event->image) : asset('image/no-photo.png') }}" alt="" style="width: 100px; height: auto"></td>
                <td>{{$event->name}}</td>
                <td>{{$event->description}}</td>
                <td>{{$event->type->name}}</td>
                <td>{{$event->price}} руб.</td>
                <td>{{$event->teacher->name}}</td>
                <td>{{$event->date->translatedFormat('d M Y | H:i')}}</td>
                <td>{{$event->time}} мин.</td>
                <td><a href="{{route('events.edit', $event->id)}}">Изменить</a></td>
                <td>
                    <form method="post" action="{{route('events.destroy', $event)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" onclick="return confirm('Удалить?')" value="Удалить" class="btn btn-primary">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
