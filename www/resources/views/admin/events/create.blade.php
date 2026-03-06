@extends('themeAdminPanel')
@section('content')
    <form method="post" action="{{route('events.store')}}" enctype="multipart/form-data"> {{-- для добавления фото добавляем к форме    enctype="multipart/form-data"--}}
    @csrf
    <h3>Добавить новое событие</h3>
    <label for="image">Фото</label>
    <input type="file" name="image" id="image">{{-- тип инпута file --}}
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
    <select name="teacherId">
        <option value="">Выбрать</option>
        @foreach($teachers as $teacher)
            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
        @endforeach
    </select>
    <label for="date">Дата события</label>
    <input type="datetime-local" name="date">
    <label for="time">Длительность занятия
        <input type="number" name="time"> мин.
    </label>
    <input type="submit" value="Добавить" class="btn btn-primary">
</form>
@endsection
