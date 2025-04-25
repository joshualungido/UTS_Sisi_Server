<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <nav class="bg-white shadow p-4">
        <div class="max-w-7xl mx-auto flex justify-between">
            <a href="{{ route('dashboard') }}" class="text-xl font-bold text-blue-600">Inventory Management</a>
            <div class="space-x-4">
                <a href="{{ route('items.index') }}" class="text-blue-600 hover:underline">Items</a>
                <a href="{{ route('categories.index') }}" class="text-blue-600 hover:underline">Categories</a>
                <a href="{{ route('suppliers.index') }}" class="text-blue-600 hover:underline">Suppliers</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto p-6">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>