<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $menus = Menu::where('on_sale', true)->get();
        return view('welcome', compact('menus'));
    }

    public function requestIndex()
    {
        return view('request.index');
    }

    public function myOrders()
    {
        return view('request.orders');
    }

    public function myOrderDetails($orderId)
    {
        return view('request.details', compact('orderId'));
    }
}
