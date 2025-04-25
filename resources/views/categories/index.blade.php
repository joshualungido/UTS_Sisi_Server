@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Categories</h1>
        <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Category</a>
    </div>

    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-xl font-semibold mb-4">Category Summary</h2>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Category</th>
                    <th class="py-2 px-4 border-b">Item Count</th>
                    <th class="py-2 px-4 border-b">Total Value</th>
                    <th class="py-2 px-4 border-b">Average Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorySummaries as $summary)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $summary['name'] }}</td>
                        <td class="py-2 px-4 border-b">{{ $summary['item_count'] }}</td>
                        <td class="py-2 px-4 border-b">Rp {{ number_format($summary['total_value'], 2) }}</td>
                        <td class="py-2 px-4 border-b">Rp {{ number_format($summary['average_price'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">All Categories</h2>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b">Created By</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $category->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $category->description ?? '-' }}</td>
                        <td class="py-2 px-4 border-b">{{ $category->admin->username }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('categories.report', $category->id) }}" class="text-blue-600 hover:underline">View Report</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection