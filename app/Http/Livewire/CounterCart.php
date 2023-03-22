<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shoppingcart;

class CounterCart extends Component
{
    protected $listeners = ['updateCartCount' => 'render'];

    public function render()
    {
        $cart = session()->get('cart');

        $cartItemsTotal = $cart == null ? 0 : array_sum(array_map(fn ($item) => $item['qty'], $cart));

        return view('livewire.counter-cart', [
            'total' => $cartItemsTotal
        ]);
    }
}
