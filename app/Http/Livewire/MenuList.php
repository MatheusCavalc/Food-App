<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Drink;
use App\Models\Menu;
use Livewire\Component;

class MenuList extends Component
{
    public $menu;

    public function render()
    {
        $menus = Menu::all();
        $categories = Category::all();

        return view('livewire.menu-list', compact('menus', 'categories'));
    }

    public function addToCart($id, $qty)
    {
        if(auth()->user()) {

            $cart = session()->get('cart');

            $menu = Menu::where('id', $id)->first();

            //dd($qty);
            //dd($menu);

            if (!$cart) {
                $cart = [
                    $menu->id => [
                        'id' => $menu->id,
                        'name' => $menu->name,
                        'image' => $menu->image,
                        'qty' => $qty,
                        'price' => $menu->price,
                        'total_price' => $menu->price * $qty
                    ]
                ];

                session()->put('cart', $cart);

                $this->emit('updateCartCount');

                session()->flash('success','Product added to the cart successfully');
            }

            if (isset($cart)) {
                $cart[$menu->id] = [
                    'id' => $menu->id,
                    'name' => $menu->name,
                    'image' => $menu->image,
                    'qty' => $qty,
                    'price' => $menu->price,
                    'total_price' => $menu->price * $qty
                ];
                session()->put('cart', $cart);

                $this->emit('updateCartCount');

                session()->flash('success','Product added to the cart successfully');
            }

        } else {
            return redirect(route('login'));
        }
    }
}
