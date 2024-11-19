@extends('manajer.layout')

@section('content-manajer')
<div class="container mx-auto p-6">
    <!-- Header -->
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Laporan Stok dan Transaksi Barang</h1>

    <!-- Filter Laporan -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 mb-6">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Filter Laporan</h2>
        <form>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Periode -->
                <div>
                    <label for="periode" class="block text-gray-600 dark:text-gray-300 mb-1">Periode</label>
                    <input type="date" id="periode" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                </div>
                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-gray-600 dark:text-gray-300 mb-1">Kategori</label>
                    <select id="kategori" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                        <option value="">Semua Kategori</option>
                        <option value="elektronik">Elektronik</option>
                        <option value="bahan-bangunan">Bahan Bangunan</option>
                    </select>
                </div>
                <!-- Tombol Cari -->
                <div class="flex items-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 dark:hover:bg-blue-400">Cari</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tabel Laporan Stok Barang -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden mb-6">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 px-6 py-4">Laporan Stok Barang</h2>
        <table class="table-auto w-full text-left">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">No</th>
                    <th class="py-3 px-6">Nama Produk</th>
                    <th class="py-3 px-6">Kategori</th>
                    <th class="py-3 px-6">Stok Tersedia</th>
                    <th class="py-3 px-6">Stok Minimum</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                <!-- Contoh Data -->
                <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-600">
                    <td class="py-3 px-6">1</td>
                    <td class="py-3 px-6">Produk A</td>
                    <td class="py-3 px-6">Elektronik</td>
                    <td class="py-3 px-6">100</td>
                    <td class="py-3 px-6">10</td>
                </tr>
                <!-- Tambahkan data lainnya di sini -->
            </tbody>
        </table>
    </div>

    <!-- Tabel Laporan Barang Masuk dan Keluar -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 px-6 py-4">Laporan Barang Masuk dan Keluar</h2>
        <table class="table-auto w-full text-left">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">No</th>
                    <th class="py-3 px-6">Nama Produk</th>
                    <th class="py-3 px-6">Tanggal</th>
                    <th class="py-3 px-6">Transaksi</th>
                    <th class="py-3 px-6">Jumlah</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                <!-- Contoh Data -->
                <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-600">
                    <td class="py-3 px-6">1</td>
                    <td class="py-3 px-6">Produk A</td>
                    <td class="py-3 px-6">2024-11-19</td>
                    <td class="py-3 px-6">Masuk</td>
                    <td class="py-3 px-6">50</td>
                </tr>
                <!-- Tambahkan data lainnya di sini -->
            </tbody>
        </table>
    </div>
</div>
@endsection
