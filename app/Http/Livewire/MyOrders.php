<?php

namespace App\Http\Livewire;

use App\Models\Shoppingcart;
use Livewire\Component;

class MyOrders extends Component
{
    public $status = "";

    public function render()
    {
        $myorders = Shoppingcart::where('user_id', auth()->user()->id)
                                ->where('status', 'success')
                                ->where('status_delivery', '!=', 'Entregue')
                                ->get();

        $status = Shoppingcart::where('user_id', auth()->user()->id)
                                ->where('status', 'success')
                                ->where('status_delivery', '!=', 'Entregue')
                               ->first();

        if ($status != null) {
            $this->status = $status->status_delivery;
        } else {
            $this->status = 'Sem Pedidos';
        }

        return view('livewire.my-orders', compact('myorders'));
    }

    public function delete($user_id)
    {
        Shoppingcart::where('user_id', $user_id)
                    ->where('status_delivery', '!=', 'Entregue')
                    ->update(['status_delivery' => 'Entregue']);
    }
}
