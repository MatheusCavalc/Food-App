<?php

namespace App\Http\Livewire;

use App\Models\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartRequests extends Component
{

    public $address = null;
    public $phone = null;

    protected $rules = [
        'address' => 'required',
        'phone' => 'required',
    ];

    public function render()
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();

        return view('livewire.cart-requests', compact('cart', 'total'));
    }

    public function endCart()
    {
        $this->validate();

        $user = auth()->user();

        Cart::store($user->name);

        Request::where('identifier', $user->name)->update(['address' => $this->address, 'phone' => $this->phone, 'status' => 'Pedido Recebido']);

        return redirect()->route('request.index');
    }

    public function removeToCart($rowId)
    {
        Cart::remove($rowId);
    }

    public function deleteCart()
    {
        Cart::destroy();
    }
}
