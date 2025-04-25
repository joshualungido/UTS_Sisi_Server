@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Items in Category: {{ $category->name }}</h1>
        <a href="{{ route('categories.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Back to Categories</a>
    </div>

    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-xl font-semibold mb-4">Category Summary</h2>
        <p>Total Items: {{ $totalItems }}</p>
        <p>Total Value: Rp {{ number_format($totalValue, 2) }}</p>
        <p>Average Price: Rp {{ number_format($averagePrice, 2) }}</p>
        <p>Created By: {{ $category->admin->username }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Items List</h2>
        @if($items->isEmpty())
            <p>No items in this category.</p>
        @else
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Description</th>
                        <th class="py-2 px-4 border-b">Price</th>
                        <th class="py-2 px-4 border-b">Quantity</th>
                        <th class="py-2 px-4 border-b">Supplier</th>
                        <th class="py-2 px-4 border-b">Created By</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->description ?? '-' }}</td>
                            <td class="py-2 px-4 border-b">Rp {{ number_format($item->price, 2) }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->quantity }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->supplier->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->admin->username }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection