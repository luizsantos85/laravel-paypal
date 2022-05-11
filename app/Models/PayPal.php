<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

class PayPal extends Model
{
    use HasFactory;

    private $apiContext;
    private $identify;
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(config('paypal.client_id'), config('paypal.secret_id'))
        );

        $this->apiContext->setConfig(config('paypal.settings'));
        $this->identify = bcrypt(uniqid('YmdHis'));
        $this->cart = $cart;
    }

    public function generate()
    {
        $payment = new Payment();
        $payment->setIntent("order")
            ->setPayer($this->payer())
            ->setRedirectUrls($this->redirectUrl())
            ->setTransactions(array($this->transaction()));

        // $request = clone $payment;

        try {
            $payment->create($this->apiContext);
            $paymentId = $payment->getId();
            $approvalUrl = $payment->getApprovalLink();

            return [
                'status' => true,
                'url_paypal' => $approvalUrl,
                'identify' => $this->identify,
                'payment_id' => $paymentId
            ];
        } catch (Exception $ex) {
            return [
                'status' => false,
                'message' => $ex->getMessage()
            ];
        }
    }

    public function payer()
    {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        return $payer;
    }

    public function items()
    {
        /* $item1 = new Item();
        $item1->setName('Ground Coffee 40 oz')
            ->setCurrency('BRL')
            ->setQuantity(1)
            ->setPrice(7.5);
        $item2 = new Item();
        $item2->setName('Granola bars')
            ->setCurrency('BRL')
            ->setQuantity(5)
            ->setPrice(2);
        */
        $items = [];
        $itemsCart = $this->cart->getItems();
        foreach ($itemsCart as $itemCart) {
            $item = new Item();
            $item->setName($itemCart['item']->title)
                ->setCurrency('BRL')
                ->setQuantity($itemCart['qtd'])
                ->setPrice($itemCart['item']->price);

            array_push($items, $item);
        }

        return $items;
    }

    public function itemList()
    {
        $itemList = new ItemList();
        $itemList->setItems($this->items());

        return $itemList;
    }

    public function details()
    {
        $details = new Details();
        $details->setSubtotal($this->cart->totalPrice());
        /* $details->setShipping(1.2)  //Tarifas
            ->setTax(1.3)           //frete
            ->setSubtotal(17.50);
        */
        return $details;
    }

    public function amount()
    {
        $amount = new Amount();
        $amount->setCurrency("BRL")
            ->setTotal($this->cart->totalPrice())   //caso utilize frete ou taxas somar ao total da compra
            ->setDetails($this->details());

        return $amount;
    }

    public function transaction()
    {
        $transaction = new Transaction();
        $transaction->setAmount($this->amount())
            ->setItemList($this->itemList())
            ->setDescription("Compra Loja Laravel com Paypal")
            ->setInvoiceNumber($this->identify);

        return $transaction;
    }

    public function redirectUrl()
    {
        $baseRoute = route('return.paypal');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("{$baseRoute}?success=true")
            ->setCancelUrl("{$baseRoute}?success=false");

        return $redirectUrls;
    }

    /**
     * Aprovação do pedido
     */
    public function execute($paymentId, $token, $payerId)
    {
        $payment = Payment::get($paymentId, $this->apiContext);

        if ($payment->getState() != 'approved') {
            $execution = new PaymentExecution();
            $execution->setPayerId($payerId);

            $result = $payment->execute($execution, $this->apiContext);

            return $result->getState();
        }

        return $payment->getState();
    }
}
