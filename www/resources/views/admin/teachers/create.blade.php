@extends('themeAdminPanel')
@section('content')
    <form method="post" action="">
        @csrf
        <h3>Добавить</h3>
        <label for=""></label>
        <input type="text" name="" placeholder="">
        <input type="submit" value="Добавить">
    </form>
@endsection
