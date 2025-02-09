@extends('manajer.layout')

@section('content-manajer')
<div class="container mx-auto p-6">
    <!-- Header -->
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-800">Laporan Stok dan Transaksi Barang</h1>

    
    <!-- Tombol Cetak PDF -->
    <div class="mb-6 flex justify-end">
        <a href="{{ route('manajer.report.pdf', request()->query()) }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 dark:hover:bg-blue-700">
            Cetak PDF
        </a>
    </div>
    
    <!-- Filter Laporan -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 mb-6">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Filter Laporan</h2>
        <form action="{{ route('manajer.menu.report') }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Periode Mulai -->
                <div>
                    <label for="start_date" class="block text-gray-600 dark:text-gray-300 mb-1">Periode Mulai</label>
                    <input type="date" id="start_date" name="start_date" value="{{ $filters['start_date'] ?? '' }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                </div>
                <!-- Periode Sampai -->
                <div>
                    <label for="end_date" class="block text-gray-600 dark:text-gray-300 mb-1">Periode Sampai</label>
                    <input type="date" id="end_date" name="end_date" value="{{ $filters['end_date'] ?? '' }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                </div>
                <!-- Kategori -->
                <div>
                    <label for="category" class="block text-gray-600 dark:text-gray-300 mb-1">Kategori</label>
                    <select id="category" name="category" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ (isset($filters['category']) && $filters['category'] == $category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- Tombol Cari -->
                <div class="flex items-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 dark:hover:bg-blue-700">Cari</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Laporan Transaksi Barang Masuk -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden mb-6">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 px-6 py-4">Laporan Transaksi Barang Masuk</h2>
        <table class="table-auto w-full text-left">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">No</th>
                    <th class="py-3 px-6">Nama Produk</th>
                    <th class="py-3 px-6">Tanggal</th>
                    <th class="py-3 px-6">Jumlah</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                @forelse($incomingTransactions as $index => $transaction)
                    <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="py-3 px-6">{{ $index + 1 }}</td>
                        <td class="py-3 px-6">{{ $transaction->product->name ?? '-' }}</td>
                        <td class="py-3 px-6">{{ \Carbon\Carbon::parse($transaction->created_at)->format('Y-m-d') }}</td>
                        <td class="py-3 px-6">{{ $transaction->quantity }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-3 px-6 text-center">Tidak ada transaksi masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Laporan Transaksi Barang Keluar -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden mb-6">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 px-6 py-4">Laporan Transaksi Barang Keluar</h2>
        <table class="table-auto w-full text-left">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">No</th>
                    <th class="py-3 px-6">Nama Produk</th>
                    <th class="py-3 px-6">Tanggal</th>
                    <th class="py-3 px-6">Jumlah</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                @forelse($outgoingTransactions as $index => $transaction)
                    <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="py-3 px-6">{{ $index + 1 }}</td>
                        <td class="py-3 px-6">{{ $transaction->product->name ?? '-' }}</td>
                        <td class="py-3 px-6">{{ \Carbon\Carbon::parse($transaction->created_at)->format('Y-m-d') }}</td>
                        <td class="py-3 px-6">{{ $transaction->quantity }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-3 px-6 text-center">Tidak ada transaksi keluar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Laporan Stock Opname -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 px-6 py-4">Laporan Stock Opname</h2>
        <table class="table-auto w-full text-left">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">No</th>
                    <th class="py-3 px-6">Nama Produk</th>
                    <th class="py-3 px-6">Tanggal Opname</th>
                    <th class="py-3 px-6">Selisih</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                @forelse($stockOpnames as $index => $opname)
                    <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="py-3 px-6">{{ $index + 1 }}</td>
                        <td class="py-3 px-6">{{ $opname->product->name ?? '-' }}</td>
                        <td class="py-3 px-6">{{ \Carbon\Carbon::parse($opname->date)->format('Y-m-d') }}</td>
                        <td class="py-3 px-6">{{ $opname->difference }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-3 px-6 text-center">Tidak ada data stock opname.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
