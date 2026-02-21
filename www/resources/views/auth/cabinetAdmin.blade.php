@extends('themeAdminPanel')
@section('content')
    <form method="post" action="">
        @csrf
        <h3>Новое событие</h3>
        <label for="name">Название</label>
        <input type="text" name="name">
        <label for="description">Описание</label>
        <textarea name="description"></textarea>
        <label for="typeId">Тип события</label>
        <select name="typeId">
            <option value="">Выбрать</option>
            @foreach($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
        </select>
        <label for="price">Цена
            <input type="text" name="price"> руб.
        </label>
        <label for="teacherId">Преподаватель</label>
        <select type="teacherId">
            <option value="">Выбрать</option>
            @foreach($teachers as $teacher)
                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
            @endforeach
        </select>
        <label for="date">Дата события</label>
        <input type="date" name="date">
        <label for="time">Длительность занятия
            <input type="number" name="time"> мин.
        </label>
        <input type="submit" value="Добавить">
    </form>
    <br><br><br>
    <table class="table table-striped">
        <tr>
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
                <td>{{$event->name}}</td>
                <td>{{$event->description}}</td>
                <td>{{$event->type->name}}</td>
                <td>{{$event->price}} руб.</td>
                <td>{{$event->teacher->name}}</td>
                <td>{{$event->date->translatedFormat('d M Y | H:i')}}</td>
                <td>{{$event->time}} мин.</td>
                <td><a href="">Изменить</a></td>
                <td>
                    <form>
                        @csrf
                        @method('DELETE')
                        <input type="submit" onclick="return confirm('Удалить?')" value="Удалить">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

{{--            <td>{{date_format($event->date, 'd/m/y H:i')}}</td>--}}
