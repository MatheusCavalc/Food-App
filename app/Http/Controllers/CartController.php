<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = Menu::findOrFail($request->input('menu_id'));

        Cart::add($menu->id,
                  $menu->name,
                  $request->quantity,
                  $menu->price,
                  0,
                  ['size' => $menu->size]
                );

        return redirect()->route('request.index')->with('message', 'Pedido adicionado');
    }
}
