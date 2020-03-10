<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartCtrl extends Controller
{
    public function add_to_cart(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        $result['id'] = $product->id; 
        $result['name'] = $product->name; 
        $result['price'] = $product->price; 
        $result['quantity'] = 1; 
        
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            array_push($cart, $result);
            $request->session()->put('cart', $cart);
        }else {
            $request->session()->put('cart', [$result]);
        }
        $request->session()->flash('success', $product->name.' Berhasil ditambahkan ke keranjang');
        return back();
    }

    public function view_cart(Request $request)
    {
        return view('cart.index');
    }
}
