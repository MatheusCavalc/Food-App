<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Menu;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Requests extends Component
{
    public $quantity = 1;

    public function render()
    {
        $menus = Menu::all();
        $categories = Category::all();

        return view('livewire.requests', compact('menus', 'categories'));
    }

    public function addToCart($id)
    {
        $menu = Menu::findOrFail($id);

        Cart::add($menu->id,
                  $menu->name,
                  $this->quantity,
                  $menu->price,
                  0,
                  ['size' => $menu->size]
                );

        //dd($this->quantity);

        return redirect()->route('request.index')->with('message', 'Pedido adicionado');
    }
}
