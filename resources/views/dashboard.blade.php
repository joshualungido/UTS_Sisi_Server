@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">System Overview</h1>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Total Items</h2>
            <p class="text-2xl">{{ $totalItems }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Total Stock Value</h2>
            <p class="text-2xl">Rp {{ number_format($totalStockValue, 2) }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Total Categories</h2>
            <p class="text-2xl">{{ $totalCategories }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Total Suppliers</h2>
            <p class="text-2xl">{{ $totalSuppliers }}</p>
        </div>
    </div>
@endsection