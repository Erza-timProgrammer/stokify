@extends('admin.layout')

@section('content')
<div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
        Form Transaksi - {{ $type === 'in' ? 'Stok Masuk' : 'Stok Keluar' }}
    </h1>
    
    <!-- Form transaksi -->
    <form action="{{ route('transaction.store') }}" method="POST" class="mt-4">
        @csrf

        <!-- Hidden input untuk tipe transaksi -->
        <input type="hidden" name="type" value="{{ $type }}">
        
        <!-- Pilih Produk -->
        <div class="mb-4">
            <label for="product_id" class="block text-gray-700 dark:text-gray-300 mb-2">Produk</label>
            <select name="product_id" id="product_id" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100" required>
                <option value="">Pilih Produk</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach 
            </select>
        </div>
        
        <!-- Jumlah Produk -->
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 dark:text-gray-300 mb-2">Jumlah</label>
            <input type="number" name="quantity" id="quantity" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100" placeholder="Masukkan jumlah produk" required>
        </div>
        
        <!-- Catatan Transaksi -->
        <div class="mb-4">
            <label for="notes" class="block text-gray-700 dark:text-gray-300 mb-2">Catatan</label>
            <textarea name="notes" id="notes" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100" placeholder="Catatan transaksi"></textarea>
        </div>
        
        <!-- Tombol Submit -->
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
            Simpan Transaksi
        </button>
    </form>
</div>
@endsection
