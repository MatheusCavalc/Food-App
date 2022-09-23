<?php

namespace App\Http\Livewire;

use App\Models\Shoppingcart;
use Livewire\Component;

class OrdersList extends Component
{
    public function render()
    {
        $orders = Shoppingcart::where(['status' => 'success'])->get();

        //dd($orders);

        return view('livewire.orders-list', compact('orders'));
    }

    public function toProduction($user_id)
    {
        Shoppingcart::where('user_id', $user_id)
                    ->where('status_delivery', 'Recebido')
                    ->update(['status_delivery' => 'Producao']);
    }

    public function toDelivery($user_id)
    {
        Shoppingcart::where('user_id', $user_id)
                    ->where('status_delivery', 'Producao')
                    ->update(['status_delivery' => 'Entrega']);
    }
}
