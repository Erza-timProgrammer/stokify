@extends('manajer.layout')

@section('content-manajer')
<div class="container mx-auto p-6">
    <!-- Header -->
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Daftar Supplier</h1>

    <!-- Tabel Daftar Supplier -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <table class="table-auto w-full text-left">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">No</th>
                    <th class="py-3 px-6">Nama Supplier</th>
                    <th class="py-3 px-6">Alamat</th>
                    <th class="py-3 px-6">Kontak</th>
                    <th class="py-3 px-6">Informasi Tambahan</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                <!-- Contoh Data -->
                <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-600">
                    <td class="py-3 px-6">1</td>
                    <td class="py-3 px-6">PT Sumber Jaya</td>
                    <td class="py-3 px-6">Jl. Merdeka No. 10</td>
                    <td class="py-3 px-6">081234567890</td>
                    <td class="py-3 px-6">Supplier Bahan Bangunan</td>
                </tr>
                <!-- Tambahkan data supplier lainnya di sini -->
            </tbody>
        </table>
    </div>
</div>
@endsection
