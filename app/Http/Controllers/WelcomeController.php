<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('welcome', compact('menus'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
