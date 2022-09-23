<?php

namespace App\Http\Livewire;

use App\Models\Shoppingcart;
use Livewire\Component;

class CartCounter extends Component
{
    public $total = 0;

    protected $listeners = ['updateCartCount' => 'getCartItemCount'];

    public function render()
    {
        $this->getCartItemCount();

        return view('livewire.cart-counter');
    }

    public function getCartItemCount()
    {
        $this->total = Shoppingcart::whereUserId(auth()->user()->id)->count();
    }
}
