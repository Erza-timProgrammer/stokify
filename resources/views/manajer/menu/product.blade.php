@extends('manajer.layout')

@section('content-manajer')
<div class="container mx-auto p-6">
    <!-- Header -->
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-800">Manajemen Produk</h1>

    <!-- Daftar Produk -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden mb-6">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 px-6 py-4">Daftar Produk</h2>
        <table class="min-w-full text-left table-auto">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">No</th>
                    <th class="py-3 px-6">Nama Produk</th>
                    <th class="py-3 px-6">Harga Jual</th>
                    <th class="py-3 px-6">Stok</th>
                    <th class="py-3 px-6">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                @forelse($products as $index => $product)
                <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-600">
                    <td class="py-3 px-6">{{ $index + 1 }}</td>
                    <td class="py-3 px-6">{{ $product->name }}</td>
                    <td class="py-3 px-6">Rp {{ number_format($product->selling_price, 0, ',', '.') }}</td>
                    <td class="py-3 px-6">{{ $product->stock }}</td>
                    <td class="py-3 px-6">
                        <!-- Tombol Detail/Edit, sesuaikan dengan route yang ada -->
                        <a href="{{ route('product.show', $product->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 dark:hover:bg-blue-400">Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-3 px-6 text-center">Tidak ada produk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
