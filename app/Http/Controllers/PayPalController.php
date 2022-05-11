<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\PayPal;
use Illuminate\Http\Request;

class PayPalController extends Controller
{

    public function __construct()
    {
        //middleware criado e renomeado em kernel para poder ser utilizado.
        $this->middleware('cart-items');
    }

    public function paypal(Order $order)
    {
        $cart = new Cart;
        $paypal = new PayPal($cart);
        $result = $paypal->generate();

        if ($result['status']) {
            //cria nova ordem de produtos
            $order->newOrderProducts(
                $cart->totalPrice(),
                $result['payment_id'],
                $result['identify'],
                $cart->getItems()
            );

            return redirect()->away($result['url_paypal']);
        } else {
            return redirect()->route('cart')->with('message', 'Erro inesperado.');
        }
    }

    public function returnPaypal(Request $request, Order $order)
    {
        $success = ($request->success == true) ? true : false;
        $paymentId = $request->paymentId;
        $token = $request->token;
        $payerId = $request->PayerID;

        if (!$success) {
            dd('Pedido cancelado!');
        }

        $cart = new Cart;
        $paypal = new PayPal($cart);
        $result = $paypal->execute($paymentId, $token, $payerId);

        if ($result == 'approved') {
            $order->where('payment_id', $paymentId)->update(['status' => 'approved']);

            return redirect()->route('home');
        } else {
            dd('Pedido não aprovado!');
        }
    }
}
