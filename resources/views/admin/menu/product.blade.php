@extends('admin.layout')

@section('content')
<div class="p-6 w-full min-h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Card Statistics -->
    <div class="grid grid-cols-3 gap-6 mb-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Total Produk</h2>
            <p class="text-4xl font-bold text-gray-800 dark:text-gray-100">2,340</p>
            <p class="text-gray-500 dark:text-gray-400 text-sm">+1.5% since last month</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Total Kategori</h2>
            <p class="text-4xl font-bold text-gray-800 dark:text-gray-100">15</p>
            <p class="text-gray-500 dark:text-gray-400 text-sm">+2 new categories</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Low Stock Alert</h2>
            <p class="text-4xl font-bold text-gray-800 dark:text-gray-100">8</p>
            <p class="text-gray-500 dark:text-gray-400 text-sm">products below threshold</p>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="grid grid-cols-3 gap-6">
        <!-- Products Section (spans 2 columns) -->
        <div class="col-span-2 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Daftar Produk</h2>
                <div class="space-x-3">
                    <button class="bg-green-500 text-white px-3 py-2 rounded-lg text-sm hover:bg-green-600">
                        Import
                    </button>
                    <button class="bg-blue-500 text-white px-3 py-2 rounded-lg text-sm hover:bg-blue-600">
                        Export
                    </button>
                    <button class="bg-indigo-500 text-white px-3 py-2 rounded-lg text-sm hover:bg-indigo-600">
                        + Produk
                    </button>
                </div>
            </div>

            <!-- Search and Filter -->
            <div class="flex gap-4 mb-6">
                <input type="text" placeholder="Cari produk..." 
                       class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <select class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">Semua Kategori</option>
                    <!-- {/* Loop kategori */} -->
                </select>
            </div>

            <!-- Products Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Stok</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Harga</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-100">Produk Example</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-100">Kategori 1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-100">100</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-100">Rp 150.000</td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <button class="text-blue-600 hover:text-blue-900 dark:text-blue-400">Edit</button>
                                <button class="text-red-600 hover:text-red-900 dark:text-red-400">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-between border-t border-gray-200 dark:border-gray-700 px-4 py-3 sm:px-6 mt-4">
                <div class="flex justify-between items-center w-full">
                    <div class="text-sm text-gray-700 dark:text-gray-400">
                        Showing 1 to 10 of 50 entries
                    </div>
                    <div class="space-x-2">
                        <button class="px-3 py-1 border rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">Previous</button>
                        <button class="px-3 py-1 border rounded-lg bg-blue-500 text-white dark:bg-blue-600">1</button>
                        <button class="px-3 py-1 border rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">2</button>
                        <button class="px-3 py-1 border rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">3</button>
                        <button class="px-3 py-1 border rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">Next</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Section -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Kategori</h2>
                <button class="bg-blue-500 text-white px-3 py-2 rounded-lg text-sm hover:bg-blue-600">
                    + Kategori
                </button>
            </div>

            <!-- Categories List -->
            <div class="space-y-4">
                <!-- Category Items -->
                <div class="border rounded-lg p-4 dark:border-gray-700">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-medium text-gray-800 dark:text-gray-100">Kategori 1</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">15 produk</p>
                        </div>
                        <div class="space-x-2">
                            <button class="text-blue-600 hover:text-blue-900 dark:text-blue-400">Edit</button>
                            <button class="text-red-600 hover:text-red-900 dark:text-red-400">Hapus</button>
                        </div>
                    </div>
                </div>

                <div class="border rounded-lg p-4 dark:border-gray-700">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-medium text-gray-800 dark:text-gray-100">Kategori 2</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">8 produk</p>
                        </div>
                        <div class="space-x-2">
                            <button class="text-blue-600 hover:text-blue-900 dark:text-blue-400">Edit</button>
                            <button class="text-red-600 hover:text-red-900 dark:text-red-400">Hapus</button>
                        </div>
                    </div>
                </div>

                <!-- More categories... -->
            </div>
        </div>
    </div>
</div>
@endsection