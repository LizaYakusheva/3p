@php use App\Services\CartService; @endphp
@extends('theme')
@section('content')
    <h1>Оформление заказа</h1>
    <form action="{{route('order')}}" method="post">
        @csrf
        <label for="userName">Имя получателя</label>
        <input type="text" name="userName" placeholder="Введите имя">
        <label for="userPhone">Номер для связи</label>
        <input type="tel" name="userPhone" placeholder="+7(000)-000-00-00">
        <label for="userEmail">Email для рассылок</label>
        <input type="email" name="userEmail" placeholder="Введите email">
        <label for="address">Адрес доставки</label>
        <input type="text" name="address" placeholder="Введите адрес">
        <label for="comment">Комментарий к заказу</label>
        <textarea name="comment"></textarea>
        <p>Сумма заказа: {{CartService::sum()['sum']}}</p>
        <input type="submit" value="Оформить" class="btn btn-primary">
    </form>
@endsection
