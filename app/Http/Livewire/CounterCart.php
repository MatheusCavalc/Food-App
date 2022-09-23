<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shoppingcart;

class CounterCart extends Component
{
    public $total = 0;

    protected $listeners = ['updateCartCount' => 'getCartItemCount'];

    public function render()
    {
        $this->getCartItemCount();

        return view('livewire.counter-cart');
    }

    public function getCartItemCount(){
        $this->total = shoppingcart::whereUserId(auth()->user()->id)
            ->where('status', '!=', 'success')
            ->count();
    }
}
