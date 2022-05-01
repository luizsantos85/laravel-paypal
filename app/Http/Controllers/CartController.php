<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('shop.cart.index');
    }

    public function add($id)
    {
        return "Adicionando o produto {$id} no carrinho";
    }
}
