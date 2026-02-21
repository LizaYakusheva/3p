@extends('theme')
@section('content')
    <h1>Оформление заказа</h1>
    <form action="" method="post">
        @csrf
        <label for="userName">Имя</label>
        <input type="text" name="userName" value="" readonly>
        <label for="userPhone">Номер для связи</label>
        <input type="tel" name="phone" value="">
        <label for="userEmail">Email для рассылок</label>
        <input type="email" name="userEmail">
        <input type="submit" value="Отправить">
    </form>
@endsection
