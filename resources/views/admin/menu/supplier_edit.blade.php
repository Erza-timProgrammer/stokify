@extends('admin.layout')

@section('content')
<div class="p-6 w-full min-h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Header -->
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">Edit Supplier</h1>
    <p class="mb-4 text-gray-700 dark:text-gray-300">
        Admin: {{ $name }} ({{ $role }})
    </p>

    <!-- Form Edit Supplier -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <form action="{{ route('admin.suppliers.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Nama Supplier -->
                <div>
                    <label for="name" class="block text-gray-600 dark:text-gray-300 mb-1">Nama Supplier</label>
                    <input type="text" id="name" name="name" value="{{ $supplier->name }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                </div>
                <!-- Alamat -->
                <div>
                    <label for="address" class="block text-gray-600 dark:text-gray-300 mb-1">Alamat</label>
                    <input type="text" id="address" name="address" value="{{ $supplier->address }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                </div>
                <!-- Kontak (Telepon) -->
                <div>
                    <label for="phone" class="block text-gray-600 dark:text-gray-300 mb-1">Kontak</label>
                    <input type="text" id="phone" name="phone" value="{{ $supplier->phone }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                </div>
                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-600 dark:text-gray-300 mb-1">Email</label>
                    <input type="email" id="email" name="email" value="{{ $supplier->email }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                </div>
            </div>
            <!-- Tombol Submit -->
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 dark:hover:bg-blue-400">Update Supplier</button>
            </div>
        </form>
    </div>
</div>
@endsection
