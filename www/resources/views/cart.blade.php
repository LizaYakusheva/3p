@php use App\Services\CartService; @endphp
@extends('theme')
@section('content')
    <h1>Корзина</h1>
    @if(Auth::user()->cart->isEmpty()){{--isEmpty() проверяет на пустоту--}}
        <p>Корзина пуста</p>
        <a href="" class="btn btn-light">Перейти к товарам</a>
    @else
        <form action="{{route('cartClear')}}">
            <input type="submit" value="Отчистить корзину" class="btn btn-light">
        </form>
        <br>
        <table class="table table-striped">
            @foreach(Auth::user()->cart as $item)
                <tr class="item-cart-tr-{{$item->id}}">
                    <td>{{$item->img}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>
                        <form action="{{route('cartAdd', $item->id)}}">
                            <input type="submit" class="add-to-cart-btn" data-product-id ="{{$item->id}}" value="+">
                        </form>
                    </td>
                    <td><span id="cart-item-{{$item->id}}">{{$item->pivot->count}}</span></td>
                    <td>
                        <form action="{{route('cartMinus', $item->id)}}">
                            <input type="submit" class="minus-from-cart-btn" data-product-id ="{{$item->id}}" value="-">
                        </form>
                    </td>
                    <td>
                        <form action="{{route('cartDetach', $item->id)}}">
                            <input type="submit" value="Удалить">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <p>Сумма заказа:<span class="cart-sum">{{CartService::sum()['sum']}}</span> руб.</p>
        <a href="{{route('order')}}" class="btn btn-primary">Перейти к оформлению</a>
    @endif

@endsection
