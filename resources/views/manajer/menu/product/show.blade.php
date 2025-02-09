@extends('manajer.layout')

@section('content-manajer')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-800">Detail Produk</h1>
    <div class="bg-gray-800 dark:bg-gray-900 shadow-md rounded-lg p-6 text-white">

        <p class="mb-2"><strong>Nama Produk:</strong> {{ $product->name }}</p>
        <p class="mb-2"><strong>SKU:</strong> {{ $product->sku }}</p>
        <p class="mb-2"><strong>Deskripsi:</strong> {{ $product->description }}</p>
        <p class="mb-2"><strong>Harga Beli:</strong> Rp {{ number_format($product->purchase_price, 0, ',', '.') }}</p>
        <p class="mb-2"><strong>Harga Jual:</strong> Rp {{ number_format($product->selling_price, 0, ',', '.') }}</p>
        <p class="mb-2"><strong>Stok:</strong> {{ $product->stock }}</p>
        <!-- Tambahkan detail lainnya jika diperlukan -->
    </div>
    <div class="mt-4">
        <a href="{{ route('manajer.menu.product') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 dark:hover:bg-blue-400">
            Kembali ke Daftar Produk
        </a>
    </div>
</div>
@endsection
