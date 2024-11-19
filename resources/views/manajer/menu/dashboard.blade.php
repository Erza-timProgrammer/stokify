@extends('manajer.layout')

@section('content-manajer')
<div class="container mx-auto p-6">
    <!-- Header -->
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Dashboard Manajer Gudang</h1>

    <!-- Ringkasan Informasi Stok Barang -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Stok Menipis -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Stok Menipis</h2>
            <p class="text-gray-600 dark:text-gray-300">Terdapat <span class="font-bold text-red-500">5</span> barang dengan stok menipis.</p>
            <ul class="mt-2 list-disc list-inside text-gray-600 dark:text-gray-300">
                <li>Produk A - 2 pcs</li>
                <li>Produk B - 3 pcs</li>
                <li>Produk C - 1 pcs</li>
                <!-- Tambahkan data lainnya di sini -->
            </ul>
        </div>

        <!-- Barang Masuk Hari Ini -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Barang Masuk Hari Ini</h2>
            <p class="text-gray-600 dark:text-gray-300">Total <span class="font-bold text-green-500">20</span> barang masuk hari ini.</p>
            <ul class="mt-2 list-disc list-inside text-gray-600 dark:text-gray-300">
                <li>Produk X - 10 pcs</li>
                <li>Produk Y - 5 pcs</li>
                <li>Produk Z - 5 pcs</li>
                <!-- Tambahkan data lainnya di sini -->
            </ul>
        </div>

        <!-- Barang Keluar Hari Ini -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Barang Keluar Hari Ini</h2>
            <p class="text-gray-600 dark:text-gray-300">Total <span class="font-bold text-blue-500">15</span> barang keluar hari ini.</p>
            <ul class="mt-2 list-disc list-inside text-gray-600 dark:text-gray-300">
                <li>Produk M - 8 pcs</li>
                <li>Produk N - 4 pcs</li>
                <li>Produk O - 3 pcs</li>
                <!-- Tambahkan data lainnya di sini -->
            </ul>
        </div>
    </div>

    <!-- Grafik atau Data Tambahan -->
    <div class="mt-6">
        <h2 class="text-lg font-semibold text-gray-800 smb-4">Grafik Stok Barang</h2>
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <!-- Placeholder untuk grafik -->
            <div class="h-64 flex items-center justify-center">
                <p class="text-gray-600 dark:text-gray-300">Grafik stok barang akan ditampilkan di sini.</p>
            </div>
        </div>
    </div>
</div>
@endsection
