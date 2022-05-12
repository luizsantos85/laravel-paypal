<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Order;
use App\Models\PayPal;

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
            $paymentId = $result['payment_id'];
            $order->newOrderProducts(
                $cart->totalPrice(),
                $paymentId,
                $result['identify'],
                $cart->getItems()
            );

            Session::put('payment_id', $paymentId);

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
            // $order->where('payment_id', $paymentId)->update(['status' => 'canceled']);
            return redirect()->route('cart')->with('message', 'Pedido cancelado!');
        }

        if (empty($paymentId) || empty($token) || empty($payerId)) {
            return redirect()->route('cart')->with('message', 'Não autorizado!');
        }

        if (!Session::has('payment_id') || Session::get('payment_id') != $paymentId) {
            return redirect()->route('cart')->with('message', 'Sessão não autorizada!');
        }


        $cart = new Cart;
        $paypal = new PayPal($cart);
        $result = $paypal->execute($paymentId, $token, $payerId);

        if ($result == 'approved') {
            $order->changeStatus($paymentId, 'approved');
            $cart->emptyCart();
            Session::forget('payment_id');


            return redirect()->route('home');
        } else {
            return redirect()->route('cart')->with('message', 'Pedido não aprovado!');
        }
    }
}
