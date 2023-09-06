<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Shoppingcart as Cart;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class ShoppingCart extends Component
{
    public $cartItems, $sub_total = 0, $total = 0, $tax = 0, $phone, $address, $payment_method;

    protected $rules = [
        'payment_method' => 'required',
        'phone' => 'required|min:9',
        'address' => 'required',
    ];

    public function render()
    {
        $this->cartItems = session()->get('cart');

        $this->total = 0;
        $this->sub_total = 0;
        $this->tax = 0;

        if ($this->cartItems != null) {
            foreach ($this->cartItems as $item) {
                $this->sub_total += $item['price'] * $item['qty'];
            }
        } else {
            $this->cartItems = [];
        }

        $this->total = $this->sub_total - $this->tax;

        return view('livewire.shopping-cart')->layout('layouts.home');
    }

    public function incrementQty($id)
    {
        $cart = Session::get('cart');

        if (isset($cart[$id]) && $cart[$id]['qty'] < 5) {
            $cart[$id]['qty'] += 1;
            session()->put('cart', $cart);
            session()->flash('success', 'Menu quantity updated !!!');
        } elseif ($cart[$id]['qty'] = 5) {
            session()->flash('success', 'Menu cannot exceed 5 units !!!');
        }
    }

    public function decrementQty($id)
    {
        $cart = Session::get('cart');

        if ($cart[$id]['qty'] > 1) {
            $cart[$id]['qty'] -= 1;
            session()->put('cart', $cart);
            session()->flash('success', 'Menu quantity updated !!!');
        } else {
            session()->flash('info', 'You cannot have less than 1 quantity');
        }
    }

    public function removeItem($id)
    {
        $cart = Session::get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            $this->emit('updateCartCount');
        }
        session()->flash('success', 'Menu removed from cart !!!');
    }

    public function checkout()
    {
        $this->validate();

        $data = [
            'total_price' => $this->total,
            'menus' => $this->cartItems,
            'phone' => $this->phone,
            'address' => $this->address,
            'payment_method' => $this->payment_method,
            'created_by' => auth()->user()->id,
        ];

        $order = Order::create($data);

        if ($order) {
            session()->forget('cart');
            $status = '';
            $this->emit('statusUpdate', $status);

            return to_route('order.details', ['id' => $order->id]);
        }

        session()->flash('error', 'Something went wrong, Please Try again');
    }
}
