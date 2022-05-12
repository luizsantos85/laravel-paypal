<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();

        return view('shop.home.index', compact('products'));
    }

    public function orders()
    {
        $orders = Order::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

        return view('shop.orders.index', compact('orders'));
    }
}
