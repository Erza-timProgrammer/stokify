@extends('admin.layout')

@section('content')
<div class="p-6 w-full min-h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Card Statistics -->
    <div class="grid grid-cols-3 gap-6 mb-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">Total Stok</h2>
            <p class="text-4xl font-bold text-gray-800 dark:text-gray-200">{{ number_format($totalStock) }}</p>
            <p class="text-gray-500 dark:text-gray-400 text-sm">Semua produk</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">Stok Minimum</h2>
            <p class="text-4xl font-bold text-red-600 dark:text-red-400">{{ $minStock }}</p>
            <p class="text-gray-500 dark:text-gray-400 text-sm">Produk dibawah batas minimum</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">Transaksi Hari Ini</h2>
            <p class="text-4xl font-bold text-gray-800 dark:text-gray-200">{{ $transactionsToday['total'] }}</p>
            <p class="text-gray-500 dark:text-gray-400 text-sm">{{ $transactionsToday['in'] }} masuk - {{ $transactionsToday['out'] }} keluar</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-3 gap-6">
        <!-- Transaction History (spans 2 columns) -->
        <div class="col-span-2 space-y-6">
            <!-- Stock Transactions -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Riwayat Transaksi</h2>
                    <div class="space-x-3">
                        <a href="{{ route('transaction.create', ['type' => 'in']) }}" class="bg-blue-500 text-white px-3 py-2 rounded-lg text-sm hover:bg-blue-600 dark:hover:bg-blue-400">
                            + Stok Masuk
                        </a>
                        <a href="{{ route('transaction.create', ['type' => 'out']) }}" class="bg-green-500 text-white px-3 py-2 rounded-lg text-sm hover:bg-green-600 dark:hover:bg-green-400">
                            - Stok Keluar
                        </a>
                    </div>
                </div>

                <!-- Filter and Search -->
                <form action="{{ route('admin.menu.stock') }}" method="GET" class="flex gap-4 mb-6">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari transaksi..." 
                           class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                    <select name="type" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                        <option value="">Semua Tipe</option>
                        <option value="in" {{ request('type') == 'in' ? 'selected' : '' }}>Stok Masuk</option>
                        <option value="out" {{ request('type') == 'out' ? 'selected' : '' }}>Stok Keluar</option>
                    </select>
                    <input type="date" name="date" value="{{ request('date') }}" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Filter</button>
                </form>

                <!-- Transactions Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Tipe</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Produk</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Jumlah</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($transactions as $transaction)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-200">{{ \Carbon\Carbon::parse($transaction->created_at)->format('Y-m-d') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($transaction->type === 'masuk')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                                Masuk
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200">
                                                Keluar
                                            </span>
                                        @endif
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-200">{{ $transaction->product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-200">
                                        {{ $transaction->quantity > 0 ? '+' . $transaction->quantity : $transaction->quantity }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-200">{{ $transaction->notes }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-800 dark:text-gray-200">Tidak ada data transaksi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-4">
                    <div class="text-sm text-gray-700 dark:text-gray-300">
                        Showing {{ $transactions->firstItem() }} to {{ $transactions->lastItem() }} of {{ $transactions->total() }} entries
                    </div>
                    <div class="space-x-2">
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>

            <!-- Stock Opname -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Stock Opname</h2>
                    <a href="{{ route('stock-opname.create') }}" class="bg-indigo-500 text-white px-3 py-2 rounded-lg text-sm hover:bg-indigo-600 dark:hover:bg-indigo-400">
                        + Stock Opname Baru
                    </a>
                </div>

                <!-- Stock Opname Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Petugas</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Selisih</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($stockOpnames as $opname)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-200">{{ \Carbon\Carbon::parse($opname->date)->format('Y-m-d') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-200">{{ $opname->status }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-200">{{ $opname->operator }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-red-600 dark:text-red-400">{{ $opname->difference }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('stock-opname.show', $opname->id) }}" class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600 dark:hover:bg-green-400">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-800 dark:text-gray-200">Tidak ada data stock opname.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Product Statistics -->
        <div class="space-y-6">
            <!-- Lowest Stock -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Stok Terendah</h2>
                <ul class="space-y-4">
                    @forelse($lowestStock as $item)
                        <li class="flex justify-between items-center">
                            <span class="text-gray-800 dark:text-gray-200">{{ $item->name }}</span>
                            <span class="text-red-600 dark:text-red-400">{{ $item->stock }}</span>
                        </li>
                    @empty
                        <li class="text-center text-gray-800 dark:text-gray-200">Tidak ada data stok terendah.</li>
                    @endforelse
                </ul>
            </div>

            <!-- Highest Stock -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Stok Tertinggi</h2>
                <ul class="space-y-4">
                    @forelse($highestStock as $item)
                        <li class="flex justify-between items-center">
                            <span class="text-gray-800 dark:text-gray-200">{{ $item->name }}</span>
                            <span class="text-green-600 dark:text-green-400">{{ $item->stock }}</span>
                        </li>
                    @empty
                        <li class="text-center text-gray-800 dark:text-gray-200">Tidak ada data stok tertinggi.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
