<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::paginate(6);

        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
            'price' => 'required|numeric',
            'tax' => 'required|numeric',
            'hsn_code' => 'max:20',
            'sac_code' => 'max:20',
        ]);

        Item::create($validated);

        return redirect()->route('item.index')->with('alert-success', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
            'price' => 'required|numeric',
            'tax' => 'required|numeric',
            'hsn_code' => 'max:20',
            'sac_code' => 'max:20',
        ]);

        $item->update($validated);

        return redirect()->route('item.index')->with('alert-success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('item.index')->with('alert-success', 'Deleted Successfully');
    }
}
