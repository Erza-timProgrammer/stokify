@extends('manajer.layout')

@section('content-manajer')
<div class="container mx-auto p-6">
    <!-- Header -->
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Manajemen Stok</h1>

    <!-- Menu Transaksi Stok -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Barang Masuk -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Transaksi Barang Masuk</h2>
            <form>
                <div class="space-y-2">
                    <div>
                        <label for="nama_produk_masuk" class="block text-gray-600 dark:text-gray-300">Nama Produk</label>
                        <input type="text" id="nama_produk_masuk" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                    <div>
                        <label for="jumlah_masuk" class="block text-gray-600 dark:text-gray-300">Jumlah</label>
                        <input type="number" id="jumlah_masuk" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 dark:hover:bg-green-400">Catat</button>
                </div>
            </form>
        </div>

        <!-- Barang Keluar -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Transaksi Barang Keluar</h2>
            <form>
                <div class="space-y-2">
                    <div>
                        <label for="nama_produk_keluar" class="block text-gray-600 dark:text-gray-300">Nama Produk</label>
                        <input type="text" id="nama_produk_keluar" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                    <div>
                        <label for="jumlah_keluar" class="block text-gray-600 dark:text-gray-300">Jumlah</label>
                        <input type="number" id="jumlah_keluar" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 dark:hover:bg-red-400">Catat</button>
                </div>
            </form>
        </div>

        <!-- Stock Opname -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Stock Opname</h2>
            <form>
                <div class="space-y-2">
                    <div>
                        <label for="nama_produk_opname" class="block text-gray-600 dark:text-gray-300">Nama Produk</label>
                        <input type="text" id="nama_produk_opname" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                    <div>
                        <label for="stok_aktual" class="block text-gray-600 dark:text-gray-300">Stok Aktual</label>
                        <input type="number" id="stok_aktual" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 dark:hover:bg-blue-400">Catat</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Laporan Stok -->
    <div class="mt-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Laporan Stok Barang</h2>
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <table class="table-auto w-full text-left">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                        <th class="py-3 px-6">No</th>
                        <th class="py-3 px-6">Nama Produk</th>
                        <th class="py-3 px-6">Stok Minimum</th>
                        <th class="py-3 px-6">Stok Tersedia</th>
                        <th class="py-3 px-6">Riwayat Perubahan</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                    <!-- Contoh Data -->
                    <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="py-3 px-6">1</td>
                        <td class="py-3 px-6">Produk A</td>
                        <td class="py-3 px-6">10</td>
                        <td class="py-3 px-6">100</td>
                        <td class="py-3 px-6">Barang masuk: 50, Barang keluar: 10</td>
                    </tr>
                    <!-- Tambahkan data lainnya di sini -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
