@extends('manajer.layout')

@section('content-manajer')
<div class="container mx-auto p-6">
    <!-- Header -->
    <!-- Total Stok Barang -->
    <h1 class="text-2xl font-bold mb-4 text-gray-100 dark:text-gray-800">Dashboard Manajer Gudang</h1>
    <div class="mt-6">
        <h2 class="text-lg font-semibold text-gray-100 dark:text-gray-800 mb-2">Total Stok Barang</h2>
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <p class="text-4xl font-bold text-gray-800 dark:text-gray-100">{{ number_format($totalStock) }}</p>
            <p class="text-gray-500 dark:text-gray-300 text-sm">Semua produk</p>
        </div>
    </div>

    <!-- Ringkasan Informasi Stok Barang -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
        <!-- Stok Menipis -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Stok Menipis</h2>
            <p class="text-gray-600 dark:text-gray-300">
                Terdapat <span class="font-bold text-red-500">{{ $lowStockCount }}</span> produk dengan stok menipis.
            </p>
            <ul class="mt-2 list-disc list-inside text-gray-600 dark:text-gray-300">
                @forelse($lowStockProducts as $product)
                    <li>{{ $product->name }} - {{ $product->stock }} pcs</li>
                @empty
                    <li>Tidak ada produk stok menipis.</li>
                @endforelse
            </ul>
        </div>

        <!-- Barang Masuk Hari Ini -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Barang Masuk Hari Ini</h2>
            <p class="text-gray-600 dark:text-gray-300">
                Total <span class="font-bold text-green-500">{{ $transactionsToday['incomingToday'] }}</span> barang masuk hari ini.
            </p>
        </div>

        <!-- Barang Keluar Hari Ini -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Barang Keluar Hari Ini</h2>
            <p class="text-gray-600 dark:text-gray-300">
                Total <span class="font-bold text-blue-500">{{ $transactionsToday['outgoingToday'] }}</span> barang keluar hari ini.
            </p>
        </div>
    </div>


    <!-- Placeholder untuk Grafik Stok Barang -->
    <div class="mt-6">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Grafik Stok Barang</h2>
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <!-- Di sini Anda bisa integrasikan Chart.js atau library grafik lainnya -->
            <div class="h-64 flex items-center justify-center">
                <p class="text-gray-600 dark:text-gray-300">Grafik stok barang akan ditampilkan di sini.</p>
            </div>
        </div>
    </div>
</div>
@endsection
