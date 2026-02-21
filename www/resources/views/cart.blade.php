@extends('theme')
@section('content')
    <h1>Корзина</h1>
    <table class="table table-striped">
        @foreach($carts as $cart)
            <tr>
                <td>{{$cart->img}}</td>
                <td>{{$cart->name}}</td>
                <td>{{$cart->count}}</td>
                <td>{{$cart->price}}</td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="courseId" value="">
                        <input type="submit" value="+">
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="courseId" value="">
                        <input type="submit" value="-">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <form action="" method="post">
        <input type="submit" value="Перейти к оформлению">
    </form>
@endsection
