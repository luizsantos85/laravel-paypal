<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total', 'status', 'payment_id', 'identify'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product');
    }

    public function newOrderProducts($totalCart, $paymentId, $identify, $itemsCart)
    {
        $order = $this->create([
            'user_id'       => auth()->user()->id,
            'total'         => $totalCart,
            'status'        => 'started',
            'payment_id'    => $paymentId,
            'identify'      => $identify,
        ]);

        $productsOrder = [];
        foreach ($itemsCart as $item) {
            $idProduct = $item['item']->id;
            $productsOrder[$idProduct] = [
                'quantity' => $item['qtd'],
                'price' => $item['item']->price
            ];
        }

        $order->products()->attach($productsOrder);
    }

    public function changeStatus($paymentId, $status)
    {
        $this->where('payment_id', $paymentId)->update(['status' => $status]);
    }
}
