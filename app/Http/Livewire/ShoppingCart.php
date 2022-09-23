<?php

namespace App\Http\Livewire;

use App\Models\Shoppingcart as Cart;
use Livewire\Component;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class ShoppingCart extends Component
{
    public $cartItems, $sub_total = 0, $total = 0, $tax = 0, $phone, $address;

    protected $rules = [
        'phone' => 'required|min:9',
        'address' => 'required',
    ];

    public function render()
    {
        $this->cartItems = Cart::with('menu')
                ->where('user_id', auth()->user()->id)
                ->where('status', '!=', 'success')
                ->get();

        $this->total = 0;$this->sub_total = 0; $this->tax = 0;

        foreach($this->cartItems as $item){
            $this->sub_total += $item->menu->price * $item->quantity;
        }
        $this->total = $this->sub_total - $this->tax;

        return view('livewire.shopping-cart');
    }

    public function incrementQty($id)
    {
        $cart = Cart::whereId($id)->first();
        $cart->quantity += 1;
        $cart->save();

        session()->flash('success', 'Menu quantity updated !!!');
    }

    public function decrementQty($id)
    {
        $cart = Cart::whereId($id)->first();
        if($cart->quantity > 1){
            $cart->quantity -= 1;
            $cart->save();
            session()->flash('success', 'Menu quantity updated !!!');
        }else{
            session()->flash('info','You cannot have less than 1 quantity');
        }
    }

    public function removeItem($id)
    {
        $cart = Cart::whereId($id)->first();

        if($cart){
            $cart->delete();
            $this->emit('updateCartCount');
        }
        session()->flash('success', 'Menu removed from cart !!!');
    }

    public function checkout()
    {
        $this->validate();

        Cart::with('menu')
                ->where('user_id', auth()->user()->id)
                ->where('status', 'pending')
                ->update(['phone' => $this->phone,
                          'address' => $this->address]);

        $provider = new PayPalClient([]);
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => 'USD',
                        'value'  => $this->total
                    ]
                ]
            ],
            'application_context' => [
                'cancel_url' => route('payment.cancel'),
                'return_url' => route('payment.success')
            ]

        ]);

        if($order['status'] == 'CREATED'){
            foreach($this->cartItems as $item){
                $item->status = 'in_process';
                $item->payment_id = $order['id'];
                $item->save();
            }
            return redirect($order['links'][1]['href']);
        }
        session()->flash('error','Something went wrong, Please Try again');
    }
}
