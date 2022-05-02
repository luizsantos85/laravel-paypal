<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','DESC')->get();

        return view('shop.home.index', compact('products'));
    }
}