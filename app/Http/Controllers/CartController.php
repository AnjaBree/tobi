<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Exception;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Cart::where("user_id", auth()->user()->id)->get();
        $total = Cart::join('products', 'cart.product_id', '=', 'products.id')
        ->selectRaw("SUM(cart.quantity * products.price) as total")
        ->where("user_id", auth()->user()->id)
        ->first()
        ->total?? 0;
        return view("cart.index", compact("items", "total"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO handle if exists
        $cart = new Cart;
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $request->product_id;
        $cart->save();
        return redirect()->back()->with("success","Item added to cart");
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
        $del = Cart::where("user_id", auth()->user()->id);
        return redirect()->back()->with("success","Deleted");
    }

    public function clear()
    {
        try {
            $del = Cart::where("user_id", auth()->user()->id)->get();
            foreach ($del as $item) {
                $item->delete();
            }
            return redirect()->back()->with("success", "Uspešno izvršena kupovina");
        } catch (Exception $e) {
            error_log($e->getMessage());
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
