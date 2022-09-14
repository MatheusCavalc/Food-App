<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DrinkStoreRequest;
use App\Models\Category;
use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinks = Drink::all();
        return view('admin.drinks.index', compact('drinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.drinks.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DrinkStoreRequest $request)
    {
        $image = $request->file('image')->store('public/categories');

        Drink::create([
            'name' => $request->name,
            'category' => $request->category,
            'image' => $image,
            'price' => $request->price
        ]);

        return to_route('admin.drinks.index')->with('success', 'Drink created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Drink $drink)
    {
        $categories = Category::all();
        return view('admin.drinks.edit', compact('drink', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drink $drink)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'image',
            'price' => 'required'
        ]);

        $image = $drink->image;
        if ($request->hasFile('image')) {
            Storage::delete($drink->image);
            $image = $request->file('image')->store('public/categories');
        }

        $drink->update([
            'name' => $request->name,
            'category' => $request->category,
            'image' => $image,
            'price' => $request->price
        ]);

        return to_route('admin.drinks.index')->with('success', 'Drink updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drink $drink)
    {
        Storage::delete($drink->image);
        $drink->delete();
        return to_route('admin.drinks.index')->with('danger', 'Drink deleted successfully.');
    }
}
