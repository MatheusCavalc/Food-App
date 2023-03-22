<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderDetails extends Component
{
    public $orderId;

    public function render()
    {
        $order = Order::where('id', $this->orderId)->first();

        return view('livewire.order-details', compact('order'));
    }

    public function received($id)
    {
        Order::where('id', $id)->update(['status' => 'Received']);

        $this->emitSelf('render');
        $this->emit('statusUpdate');
    }

    public function toProduction($id)
    {
        Order::where('id', $id)->update(['status' => 'Production']);

        $this->emitSelf('render');
        $this->emit('statusUpdate');
    }

    public function toDelivery($id)
    {
        Order::where('id', $id)->update(['status' => 'Delivery']);

        $this->emitSelf('render');
        $this->emit('statusUpdate');
    }
}
