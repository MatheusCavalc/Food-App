<?php

namespace App\Http\Livewire;

use App\Models\Shoppingcart as Cart;
use Livewire\Component;

class ShoppingCart extends Component
{
    public $cartItems, $sub_total = 0, $total = 0, $tax = 0;

    public function render()
    {
        $this->cartItems = Cart::with('menu')
                               ->where(['user_id' => auth()->user()->id])
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

        //session()->flash('success', 'Product quantity updated !!!');
    }

    public function decrementQty($id)
    {
        $cart = Cart::whereId($id)->first();
        if($cart->quantity > 1){
            $cart->quantity -= 1;
            $cart->save();
            //session()->flash('success', 'Product quantity updated !!!');
        }else{
            //session()->flash('info','You cannot have less than 1 quantity');
        }
    }

    public function removeItem($id){
        $cart = Cart::whereId($id)->first();

        if($cart){
            $cart->delete();
            $this->emit('updateCartCount');
        }
        session()->flash('success', 'Product removed from cart !!!');
    }
}
