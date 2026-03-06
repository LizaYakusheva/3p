<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Services\CartService;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::all();
        $cartItems = Product::all();
        return view('cart', [
            'carts' => $carts,
            'cartItems' => $cartItems
        ]);
    }

    public function add($id)
    {
        $cartService = new cartService();
        $result = $cartService->add($id);
        return response()->json($result);
        return back();
    }

    public function minus($id)
    {
        $cartService = new cartService();
        $result = $cartService->minus($id);
        return response()->json($result);
        return back();
    }

    public function detach($id)
    {
        $cartService = new cartService();
        $cartService->detach($id);
        return back();
    }

    public function clear()
    {
        $cartService = new cartService();
        $cartService->clear();
        return back();
    }




    public function create()
    {
        //
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
