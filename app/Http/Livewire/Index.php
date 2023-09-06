<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $menus = Menu::where('on_sale', true)->get();

        return view('livewire.index', compact('menus'))
            ->layout('layouts.home');
    }
}
