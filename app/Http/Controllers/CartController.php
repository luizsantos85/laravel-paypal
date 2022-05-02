<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {

        if (session()->has('cart')) {
            dd(session()->get('cart'));
        }

        $cart = session()->has('cart') ? session()->get('cart') : new Cart;
        // $total = $cart->total();
        $products = $cart->getItems();

        return view('shop.cart.index', compact('products'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product)
            return redirect()->route('home');

        $cart = new Cart;
        $cart->add($product);

        $request->session()->put('cart', $cart);
        dd(session()->get('cart'));

        return redirect()->route('cart');
    }

    public function decrement(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product)
            return redirect()->route('home');

        $cart = new Cart;
        $cart->removeItem($product);

        $request->session()->put('cart', $cart);

        return redirect()->route('cart');
    }
}
