<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        dd(Session::get('cart'));
        $cart = Session::has('cart') ? Session::get('cart') : new Cart;
        // $total = $cart->total();
        $products = $cart->getItems();

        return view('shop.cart.index', compact('products'));
    }

    public function add($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('home');
        }

        $cart = new Cart;
        $cart->addItem($product);

        Session::put('cart', $cart);

        return redirect()->route('cart');
    }

    public function decrement($id)
    {
        $product = Product::find($id);
        if (!$product)
            return redirect()->route('home');

        $cart = new Cart;
        $cart->removeItem($product);

        Session::put('cart', $cart);

        return redirect()->route('cart');
    }
}
