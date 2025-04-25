<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Supplier;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItems = Item::count();
        $items = Item::all(); // Ambil semua item
        $totalStockValue = $items->sum(function ($item) {
            return $item->price * $item->quantity; // Hitung price * quantity untuk setiap item
        });
        $totalCategories = Category::count();
        $totalSuppliers = Supplier::count();

        return view('dashboard', compact('totalItems', 'totalStockValue', 'totalCategories', 'totalSuppliers'));
    }
}