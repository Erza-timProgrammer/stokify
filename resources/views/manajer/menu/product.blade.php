@extends('manajer.layout')

@section('content-manajer')
<div class="container mx-auto p-6">
    <!-- Header -->
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Manajemen Produk</h1>

    <!-- Daftar Produk -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden mb-6">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 px-6 py-4">Daftar Produk</h2>
        <table class="table-auto w-full text-left">
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
                <!-- Contoh Data Produk -->
                <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-600">
                    <td class="py-3 px-6">1</td>
                    <td class="py-3 px-6">Produk A</td>
                    <td class="py-3 px-6">Rp 50,000</td>
                    <td class="py-3 px-6">100</td>
                    <td class="py-3 px-6">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 dark:hover:bg-blue-400">Detail</button>
                    </td>
                </tr>
                <!-- Tambahkan data produk lainnya di sini -->
            </tbody>
        </table>
    </div>

    <!-- Form Tambah Produk -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">Tambah Produk Baru</h2>
        <form enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Nama Produk -->
                <div>
                    <label for="nama_produk" class="block text-gray-600 dark:text-gray-300 mb-1">Nama Produk</label>
                    <input type="text" id="nama_produk" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                </div>
                <!-- Deskripsi -->
                <div class="md:col-span-2">
                    <label for="deskripsi" class="block text-gray-600 dark:text-gray-300 mb-1">Deskripsi</label>
                    <textarea id="deskripsi" rows="4" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"></textarea>
                </div>
                <!-- Harga Beli -->
                <div>
                    <label for="harga_beli" class="block text-gray-600 dark:text-gray-300 mb-1">Harga Beli</label>
                    <input type="number" id="harga_beli" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                </div>
                <!-- Harga Jual -->
                <div>
                    <label for="harga_jual" class="block text-gray-600 dark:text-gray-300 mb-1">Harga Jual</label>
                    <input type="number" id="harga_jual" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                </div>
                <!-- Stok Awal -->
                <div>
                    <label for="stok_awal" class="block text-gray-600 dark:text-gray-300 mb-1">Stok Awal</label>
                    <input type="number" id="stok_awal" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                </div>
                <!-- Gambar Produk -->
                <div class="md:col-span-2">
                    <label for="gambar_produk" class="block text-gray-600 dark:text-gray-300 mb-1">Gambar Produk</label>
                    <input type="file" id="gambar_produk" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                </div>
            </div>
            <!-- Tombol Submit -->
            <div class="mt-4">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 dark:hover:bg-green-400">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
