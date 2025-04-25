@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Add New Supplier</h1>
    <form action="{{ route('suppliers.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded" required>
        </div>
        <div class="mb-4">
            <label for="contact_info" class="block text-sm font-medium text-gray-700">Contact Info</label>
            <input type="text" name="contact_info" id="contact_info" class="mt-1 p-2 w-full border rounded">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    </form>
@endsection