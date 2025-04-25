<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category', 'supplier', 'admin')->get();
        $lowStockItems = Item::where('quantity', '<', 5)->with('category', 'supplier', 'admin')->get();
        $totalStock = Item::sum('quantity');
        $totalValue = $items->sum(function ($item) {
            return $item->price * $item->quantity; // Hitung price * quantity untuk setiap item
        });
        $averagePrice = Item::avg('price');

        return view('items.index', compact('items', 'lowStockItems', 'totalStock', 'totalValue', 'averagePrice'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('items.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'created_by' => 1, // Admin ID 1 (dari seeder)
        ]);

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }
}