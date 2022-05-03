<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $items = [];

    public function __construct()
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            $this->items = $cart->items;
        }
    }

    public function addItem(Product $product)
    {
        if (isset($this->items[$product->id])) {
            $this->items[$product->id] = [
                'item'  => $product,
                'qtd'   => $this->items[$product->id]['qtd'] + 1,
            ];
        } else {
            $this->items[$product->id] = [
                'item'  => $product,
                'qtd'   => 1,
            ];
        }
    }

    public function removeItem(Product $product)
    {
        if (isset($this->items[$product->id])) {
            if ($this->items[$product->id]['qtd'] == 1) {
                unset($this->items[$product->id]);
            } else {
                $this->items[$product->id] = [
                    'item'  => $product,
                    'qtd'   => $this->items[$product->id]['qtd'] - 1,
                ];
            }
        }
    }

    public function getItems()
    {
        return $this->items;
    }
}
