<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Shoppingcart;
use Livewire\Component;

class MenuList extends Component
{
    public $message = null;
    public $menu;

    public function render()
    {
        $menus = Menu::all();
        $categories = Category::all();

        return view('livewire.menu-list', compact('menus', 'categories'));
    }

    public function addToCart($id)
    {
        if(auth()->user()) {
            $data = [
                'user_id' => auth()->user()->id,
                'menu_id' => $id,
            ];

            Shoppingcart::updateOrCreate($data);
            $this->emit('updateCartCount');
            $this->message = 'Menu adcionado';

        } else {
            return redirect(route('login'));
        }
    }
}