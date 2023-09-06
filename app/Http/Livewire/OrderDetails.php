<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderDetails extends Component
{
    public $orderId;

    public Order $order;

    public function mount($id)
    {
        $this->orderId = $id;
        $this->order = Order::where('id', $id)->first();
    }

    public function orderAtt()
    {
        $this->order = Order::where('id', $this->orderId)->first();
    }

    public function render()
    {
        $this->orderAtt();
        return view('livewire.order-details')->layout('layouts.admin');
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
