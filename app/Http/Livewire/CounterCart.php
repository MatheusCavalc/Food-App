<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shoppingcart;

class CounterCart extends Component
{
    protected $listeners = ['updateCartCount' => 'render'];

    public function render()
    {
        return view('livewire.counter-cart', [
            'total' => Shoppingcart::whereUserId(auth()->user()->id)
                                ->where('status', '!=', 'success')
                                ->count(),
        ]);
    }
}
