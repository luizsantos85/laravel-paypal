<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Gate;

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

    public function orderDetails($idOrder)
    {
        $order = Order::find($idOrder);
        if (!$order) {
            return redirect()->back()->with('message', 'Id Inválido!');
        }

        // $this->authorize('owner-order',$order);
        if(Gate::denies('owner-order', $order)){
            return redirect()->back()->with('message', 'Não autorizado.');
        }

        $products = $order->products()->get();

        return view('shop.orders.details', compact('products','order'));
    }
}
