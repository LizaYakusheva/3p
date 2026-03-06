@extends('themeAdminPanel')
@section('content')
    <form method="post" action="{{route('events.update', $event->id)}}" enctype="multipart/form-data"> {{-- для добавления фото добавляем к форме    enctype="multipart/form-data"--}}
        @csrf
        @method('PUT')
        <h3>Изменить событие</h3>
        @if(isset($event->image))
            <img src="{{$event->image ? Storage::disk('public')->url($event->image) : '' }}" alt="">
            <input type="checkbox" name="destroyPhoto" >
            <label for="destroyPhoto">Удалить фото</label>
        @else
            <label for="image">Фото</label>
            <input type="file" name="image" id="image">
        @endif
        <label for="name">Название</label>
        <input type="text" name="name" value="{{$event->name}}">
        <label for="description">Описание</label>
        <textarea name="description">{{$event->description}}</textarea>
        <label for="typeId">Тип события</label>
        <select name="typeId">
            <option value="">Выбрать</option>
            @foreach($types as $type)
                <option value="{{$type->id}}" @selected($type->id == $event->type_id)>{{$type->name}}</option>
            @endforeach
        </select>
        <label for="price">Цена
            <input type="text" name="price" value="{{$event->price}}"> руб.
        </label>
        <label for="teacherId">Преподаватель</label>
        <select name="teacherId">
            <option value="">Выбрать</option>
            @foreach($teachers as $teacher)
                <option value="{{$teacher->id}}"@selected($teacher->id == $event->teacher_id)>{{$teacher->name}}</option>
            @endforeach
        </select>
        <label for="date">Дата события</label>
        <input type="datetime-local" name="date" value="{{$event->date->format('Y-m-d\TH:i')}}">
        <label for="time">Длительность занятия
            <input type="number" name="time" value="{{$event->time}}"> мин.
        </label>
        <input type="submit" value="Изменить" class="btn btn-primary">
    </form>
@endsection
