<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\PayPal;
use Illuminate\Http\Request;

class PayPalController extends Controller
{
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
