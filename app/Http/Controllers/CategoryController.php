<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('items')->with('admin')->get();
        $categorySummaries = Category::with('items')->get()->map(function ($category) {
            return [
                'name' => $category->name,
                'item_count' => $category->items->count(),
                'total_value' => $category->items->sum(fn($item) => $item->price * $item->quantity),
                'average_price' => $category->items->avg('price'),
            ];
        });

        return view('categories.index', compact('categories', 'categorySummaries'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => 1, // Admin ID 1
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function report($id)
    {
        $category = Category::with(['items' => function ($query) {
            $query->with('admin', 'supplier');
        }, 'admin'])->findOrFail($id);
        $items = $category->items;
        $totalItems = $items->count();
        $totalValue = $items->sum(fn($item) => $item->price * $item->quantity);
        $averagePrice = $items->avg('price');

        return view('categories.report', compact('category', 'items', 'totalItems', 'totalValue', 'averagePrice'));
    }
}