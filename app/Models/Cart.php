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

    /**
     * Adiciona itens no carrinho
     */
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

    /**
     * Remove itens do carrinho
     */
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

    /**
     * Recuperar itens do carrinho
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Retorna o preço total dos itens
     */
    public function totalPrice()
    {
        $total = 0;

        if (count($this->items) == 0) {
            return $total;
        }

        foreach ($this->items as $item) {
            $subTotal = $item['item']->price * $item['qtd'];

            $total += $subTotal;
        }

        return $total;
    }

    /**
     * Retorna os total de itens no carrinho
     */
    public function totalItems()
    {
        return count($this->items);
    }
}
