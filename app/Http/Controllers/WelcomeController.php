<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('welcome', compact('menus'));
    }

    public function requestIndex()
    {
        return view('request.index');
    }
}
