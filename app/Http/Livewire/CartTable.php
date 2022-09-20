<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartTable extends Component
{
    public function render()
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();
        $cartId = '1';

        //dd($cart);

        return view('livewire.cart-table', compact('cart', 'total', 'cartId'));
    }

    public function removeToCart($rowId)
    {
        Cart::remove($rowId);
    }

    public function deleteCart()
    {
        Cart::destroy();
    }
}
