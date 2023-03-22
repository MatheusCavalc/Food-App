<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Shoppingcart;
use Livewire\Component;

class MyOrders extends Component
{
    public $status = "";

    public function render()
    {
        $myOrders = Order::where('created_by', auth()->user()->id)->orderBy('id', 'desc')->get();

        return view('livewire.my-orders', compact('myOrders'));
    }
}
