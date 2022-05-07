<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\PayPal;
use Illuminate\Http\Request;

class PayPalController extends Controller
{

    public function __construct()
    {
        //middleware criado e renomeado em kernel para poder ser utilizado.
        $this->middleware('cart-items');
    }

    public function paypal()
    {
        $cart = new Cart;
        $paypal = new PayPal($cart);
        return redirect()->away($paypal->generate());
    }

    public function returnPaypal(Request $request)
    {
        dd($request->all());
    }
}
