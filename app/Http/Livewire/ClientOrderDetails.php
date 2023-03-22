<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class ClientOrderDetails extends Component
{
    protected $listeners = ['statusToDelivery' => 'render'];

    public $orderId;

    public function render()
    {
        return view('livewire.client-order-details', [
            'order' => Order::where('id', $this->orderId)->first(),
        ]);
    }
}
