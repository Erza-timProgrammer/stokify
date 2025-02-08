@extends('admin.layout') 
@section('content')
<div class="p-6 w-full min-h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Filter Section -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-white">Filter Laporan</h2>
        <form action="{{ route('admin.menu.report') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Periode</label>
                <div class="flex gap-2">
                    <input type="date" name="start_date" value="{{ $filters['start_date'] ?? '' }}" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <input type="date" name="end_date" value="{{ $filters['end_date'] ?? '' }}" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Kategori</label>
                <select name="category" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ (isset($filters['category']) && $filters['category'] == $cat->id) ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                    Filter
                </button>
            </div>
        </form>
    </div>

    <!-- Tabs Section -->
    <div class="mb-6">
        <nav class="flex space-x-4" aria-label="Tabs">
            <button class="px-4 py-2 text-sm font-medium rounded-md bg-blue-600 text-white dark:bg-blue-500" 
                    onclick="showTab('stock-report')" id="stock-tab">
                Laporan Stok Barang
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-md text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white" 
                    onclick="showTab('transaction-report')" id="transaction-tab">
                Laporan Transaksi
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-md text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white" 
                    onclick="showTab('user-activity')" id="activity-tab">
                Aktivitas Pengguna
            </button>
        </nav>
    </div>

    <!-- Stock Report Section -->
    <div id="stock-report" class="report-section">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Laporan Stok Barang</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Kode</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Nama Barang</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Kategori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Stok</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Satuan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($stockProducts as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">{{ $product->sku }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">{{ $product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">{{ $product->category->name ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">{{ $product->stock }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">{{ $product->unit ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-900 dark:text-gray-300">
                                        Tidak ada data stok barang.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction Report Section -->
    <div id="transaction-report" class="report-section hidden">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Laporan Transaksi</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">No Transaksi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Jenis</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Barang</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Jumlah</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($transactions as $transaction)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">
                                        {{ \Carbon\Carbon::parse($transaction->created_at)->format('Y-m-d') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">
                                        {{ $transaction->transaction_number ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($transaction->type == 'in')
                                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                                Masuk
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                                                Keluar
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">
                                        {{ $transaction->product->name ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">
                                        {{ $transaction->quantity }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">
                                        {{ $transaction->note ?? '' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-900 dark:text-gray-300">
                                        Tidak ada data transaksi.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

 <!-- User Activity Section -->
<div id="user-activity" class="report-section hidden">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Aktivitas Pengguna</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Waktu</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Pengguna</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Aktivitas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($userActivities as $activity)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">
                                    {{ \Carbon\Carbon::parse($activity->created_at)->format('Y-m-d H:i:s') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">
                                    {{ $activity->user->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">
                                    {{ $activity->activity }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">
                                    {{ $activity->detail }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-900 dark:text-gray-300">
                                    Tidak ada data aktivitas pengguna.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <!-- Export Buttons -->
    <div class="mt-4 flex gap-2">
        <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600">
            Export PDF
        </button>
        <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600">
            Export Excel
        </button>
    </div>
</div>

<script>
function showTab(tabId) {
    // Sembunyikan semua section laporan
    document.querySelectorAll('.report-section').forEach(section => {
        section.classList.add('hidden');
    });
    
    // Tampilkan section yang dipilih
    document.getElementById(tabId).classList.remove('hidden');
    
    // Update style tombol tab
    document.querySelectorAll('nav button').forEach(button => {
        button.classList.remove('bg-blue-600', 'dark:bg-blue-500', 'text-white');
        button.classList.add('text-gray-500', 'dark:text-gray-300', 'hover:text-gray-700', 'dark:hover:text-white');
    });
    
    // Highlight tab aktif
    const activeTab = document.querySelector(`button[onclick="showTab('${tabId}')"]`);
    activeTab.classList.add('bg-blue-600', 'dark:bg-blue-500', 'text-white');
    activeTab.classList.remove('text-gray-500', 'dark:text-gray-300', 'hover:text-gray-700', 'dark:hover:text-white');
}

// Inisialisasi tab pertama aktif saat halaman load
document.addEventListener('DOMContentLoaded', () => {
    showTab('stock-report');
});
</script>
@endsection
