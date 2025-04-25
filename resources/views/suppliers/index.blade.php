@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Suppliers</h1>
        <a href="{{ route('suppliers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Supplier</a>
    </div>

    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-xl font-semibold mb-4">Supplier Summary</h2>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Supplier</th>
                    <th class="py-2 px-4 border-b">Item Count</th>
                    <th class="py-2 px-4 border-b">Total Value</th>
                </tr>
            </thead>
            <tbody>
                @foreach($supplierSummaries as $summary)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $summary['name'] }}</td>
                        <td class="py-2 px-4 border-b">{{ $summary['item_count'] }}</td>
                        <td class="py-2 px-4 border-b">Rp {{ number_format($summary['total_value'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">All Suppliers</h2>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Contact Info</th>
                    <th class="py-2 px-4 border-b">Created By</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $supplier->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $supplier->contact_info ?? '-' }}</td>
                        <td class="py-2 px-4 border-b">{{ $supplier->admin->username }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection