<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use Carbon\Carbon;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');

        // Query the inventory table
        $inventories = Inventory::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                             ->orWhere('supplier', 'like', '%' . $search . '%');
            })
            ->paginate(10); // Adjust pagination as needed

        // Pass the data to the view
        return view('admin.inventories.index', compact('inventories', 'search'));
    }
    public function create()
    {
        return view('admin.inventories.form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'min_stock' => 'required|integer',
            'supplier' => 'required|string|max:255',
        ]);
        $inventory = new Inventory();
        $inventory->name = $request->name;
        $inventory->category = $request->category;
        $inventory->stock = $request->stock;
        $inventory->price = $request->price;
        $inventory->min_stock = $request->min_stock;
        $inventory->supplier = $request->supplier;
        $inventory->last_restocked = Carbon::now();
        $inventory->status = "available";
        $inventory->save();
        return redirect()->route('admin.inventories.index')->with('success', 'Inventory Created Successfully.');
    }
    public function edit($id)
    {
        $inventory = Inventory::find($id);
        return view('admin.inventories.form', compact('inventory'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'min_stock' => 'required|integer',
            'supplier' => 'required|string|max:255',
        ]);
        $inventory = Inventory::find($id);
        $inventory->name = $request->name;
        $inventory->category = $request->category;
        $inventory->stock = $request->stock;
        $inventory->price = $request->price;
        $inventory->min_stock = $request->min_stock;
        $inventory->supplier = $request->supplier;
        $inventory->last_restocked = Carbon::now();
        $inventory->status = "available";
        $inventory->save();
        return redirect()->route('admin.inventories.index')->with('success', 'Inventory Updated Successfully.');
    }
    public function show($id)
    {
        $inventory = Inventory::find($id);
        return view('admin.inventories.show', compact('inventory'));
    }
    public function destroy($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect()->route('admin.inventories.index')->with('success', 'Inventory Deleted Successfully.');
    }
}
