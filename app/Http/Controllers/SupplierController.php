<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::withCount('items')->with('admin')->get();
        $supplierSummaries = Supplier::with('items')->get()->map(function ($supplier) {
            return [
                'name' => $supplier->name,
                'item_count' => $supplier->items->count(),
                'total_value' => $supplier->items->sum(fn($item) => $item->price * $item->quantity),
            ];
        });

        return view('suppliers.index', compact('suppliers', 'supplierSummaries'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'contact_info' => 'nullable|string|max:100',
        ]);

        Supplier::create([
            'name' => $request->name,
            'contact_info' => $request->contact_info,
            'created_by' => 1, // Admin ID 1
        ]);

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    }
}