<?php

namespace App\Services;
use App\Models\Product;
use App\Models\User;
use Auth;

class CartService
{
    static function findProduct($id)
    {
        $cart = Auth::user()->cart();
        $product = $cart->where('product_id', $id)->first();
        if ($product){
           return $product->pivot->count;
        }else{
            return 0;
        }
    }

    public function add($id, $count = 1)
    {
        Product::findOrFail($id);
        $cart = Auth::user()->cart();
        $product = $cart->where('product_id', $id)->first();
        $count_current = 0;
        if ($product){ //если товар есть то
            $count_current = $product->pivot->count;
            $cart->updateExistingPivot($id, [
                'count' => $count_current + $count //текущее количество
            ]);
        }else{
            $cart->attach($id , ['count' => $count]);
        }
        $result = [
            'success' => true,
            'count' => $count_current + $count,
            'cartCount' => CartService::sum()['count'],
            'cartSum' => CartService::sum()['sum'],
            'message' => ''
        ];
        return $result;
    }

    public function minus($id)
    {
        $cart = Auth::user()->cart(); //текущая корзина пользователя
        $product = $cart->where('product_id', $id)->first();
        $count_current  = 0;
        if ($product){
            $count_current = $product->pivot->count;
            if ($count_current > 1){
                $cart->updateExistingPivot($id, ['count' => $count_current - 1]);
            }else{
                $cart->detach($id);
            }
        }
        $result = [
            'success' => true,
            'count' => $count_current - 1,
            'cartCount' => CartService::sum()['count'],
            'cartSum' => CartService::sum()['sum'],
            'message' => ''
        ];
        return $result;
    }

    public function detach($id)
    {
        $cart = Auth::user()->cart();
        $cart->detach($id);
    }

    static function clear()
    {
        $cart = Auth::user()->cart();
        $cart->detach($cart->get());
    }

    static function sum() //функция которая не нуждается в классе
    {
        $cart = Auth::user()->cart();
        $sum = $count = 0;
        foreach ($cart->get() as $item){   //$cart->get() или Auth::user()->cart для получения позиций корзины
            $sum += $item->price * $item->pivot->count;
            $count += $item->pivot->count;
        }
        return [
          'sum' => $sum,
          'count' => $count,
        ];
    }
}

//////////////Добавление
//Auth::user()->cart()->attach($id , ['count' => $count]); //добавит запись в таблицу
//return true;
