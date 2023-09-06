<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class ClientOrderDetails extends Component
{
    public $orderId;

    public Order $order;

    protected $listeners = ['statusUpdate' => 'render'];

    public function mount($id)
    {
        $this->orderId = $id;
        $this->order = Order::where('id', $id)->first();
    }

    public function render()
    {
        $this->order = Order::where('id', $this->orderId)->first();

        return view('livewire.client-order-details')->layout('layouts.home');
    }
}
