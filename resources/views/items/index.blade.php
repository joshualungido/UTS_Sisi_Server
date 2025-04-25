@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Items</h1>
        <a href="{{ route('items.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Item</a>
    </div>

    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-xl font-semibold mb-4">Stock Summary</h2>
        <p>Total Stock: {{ $totalStock }}</p>
        <p>Total Value: Rp {{ number_format($totalValue, 2) }}</p>
        <p>Average Price: Rp {{ number_format($averagePrice, 2) }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-xl font-semibold mb-4">Low Stock Items (Below 5 Units)</h2>
        @if($lowStockItems->isEmpty())
            <p>No items below 5 units.</p>
        @else
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Quantity</th>
                        <th class="py-2 px-4 border-b">Category</th>
                        <th class="py-2 px-4 border-b">Supplier</th>
                        <th class="py-2 px-4 border-b">Created By</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lowStockItems as $item)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->quantity }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->category->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->supplier->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->admin->username }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">All Items</h2>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Price</th>
                    <th class="py-2 px-4 border-b">Quantity</th>
                    <th class="py-2 px-4 border-b">Category</th>
                    <th class="py-2 px-4 border-b">Supplier</th>
                    <th class="py-2 px-4 border-b">Created By</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                        <td class="py-2 px-4 border-b">Rp {{ number_format($item->price, 2) }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->quantity }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->category->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->supplier->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->admin->username }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection