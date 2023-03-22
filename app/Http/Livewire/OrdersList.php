<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Shoppingcart;
use Livewire\Component;

class OrdersList extends Component
{
    public function render()
    {
        //$orders = Order::where('status', '!=', 'Ending')->get();
        $orders = Order::orderBy('id', 'desc')->get();

        return view('livewire.orders-list', compact('orders'));
    }
}
