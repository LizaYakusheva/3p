@php use App\Services\CartService; @endphp
<div class="col-lg-3 col-md-6 col-12 gy-5">
    <div class="card" style="width: 18rem;">
        <a href="{{route('product.show', $product)}}" class="card-body">
            <h5 class="card-name">{{$product->name}}</h5>
            <p class="card-text">Цена: {{$product->price}} руб.</p>
            <p class="card-text">Осталось: {{$product->count}} шт.</p>
            @php
                $formClass = 'd-none';
                $btnClass = '';
            @endphp
            @if( Auth::user()?->cart()->where('product_id', $product->id)->first())
                @php
                    $formClass = '';
                    $btnClass = 'd-none';
                @endphp
            @endif
            <div class="form-cart-class-{{$product->id}} {{$formClass}}">
                <form action="{{route('cartAdd', $product->id)}}" class="">
                    <input type="submit" class="add-to-cart-btn" data-product-id="{{$product->id}}" value="+">
                </form>
                <p id="cart-item-{{$product->id}}">{{ CartService::findProduct($product->id)}}</p>
                <form action="{{route('cartMinus', $product->id)}}">
                    <input type="submit" value="-" class="minus-from-cart-btn" data-product-id="{{$product->id}}">
                </form>
            </div>
            <a href="{{route('cartAdd', $product->id)}}"
               class="btn btn-primary add-to-cart-btn btn-cart-class-{{$product->id}} {{$btnClass}}"
               data-product-id="{{$product->id}}">Добавить в корзину</a>
        </a>
    </div>
</div>


{{--                $show1='';--}}
{{--                $show2='d-none';--}}
{{--                @if( Auth::user()?->cart()->where('product_id', $product->id)->first())--}}
{{--                $show1='d-none';--}}
{{--                $show2='';--}}
{{--                --}}
