<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Services\CartService;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('order');
    }

    public function success()
    {
        return view('success');
    }

    public function order(Request $request)
    {
        $userId = Auth::id();
        $sum = CartService::sum()['sum'];

        $order = Order::create([
            'user_name' => $request->userName,
            'user_phone' => $request->userPhone,
            'user_email' => $request->userEmail,
            'address' => $request->address,
            'comment' => $request->comment,
            'user_id' => $userId,
            'sum' => $sum,
        ]);

        $cart = Auth::user()->cart;

        foreach ($cart as $item){
            $order->products()->attach($item, ['count' => $item->pivot->count, 'price' => $item->price]);
        }

        CartService::clear();

        return redirect(route('success'));

    }

    protected function ordersAdmin()
    {
        return view('admin.orders');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
