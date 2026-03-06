@extends('themeAdminPanel')
@section('content')
    <form method="post" action="">
        @csrf
        <h3>Изменить</h3>
        <label for=""></label>
        <input type="text" name="" placeholder="">
        <input type="submit" value="Изменить">
    </form>
@endsection
