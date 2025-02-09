@extends('admin.layout')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Dashboard Admin</h1>
    
    <!-- Ringkasan Informasi -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Jumlah Produk -->
        <div class="bg-white dark:bg-gray-800 shadow rounded p-4">
            <h2 class="text-xl text-gray-900 dark:text-gray-100">Jumlah Produk</h2>
            <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $productCount }}</p>
        </div>
        <!-- Transaksi Masuk -->
        <div class="bg-white dark:bg-gray-800 shadow rounded p-4">
            <h2 class="text-xl text-gray-900 dark:text-gray-100">Transaksi Masuk</h2>
            <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $incomingCount }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-300">({{ $startDate }} s/d {{ $endDate }})</p>
        </div>
        <!-- Transaksi Keluar -->
        <div class="bg-white dark:bg-gray-800 shadow rounded p-4">
            <h2 class="text-xl text-gray-900 dark:text-gray-100">Transaksi Keluar</h2>
            <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $outgoingCount }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-300">({{ $startDate }} s/d {{ $endDate }})</p>
        </div>
    </div>

    <!-- Grafik Stok Barang (Transaksi Harian) -->
    <div class="bg-white dark:bg-gray-800 shadow rounded p-4 mt-6">
        <h2 class="text-xl mb-4 text-gray-900 dark:text-gray-100">Grafik Stok Barang (Transaksi Harian)</h2>
        <canvas id="stockChart"></canvas>
    </div>

    <!-- Aktivitas Pengguna Terbaru -->
    <div class="bg-white dark:bg-gray-800 shadow rounded p-4 mt-6">
        <h2 class="text-xl mb-4 text-gray-900 dark:text-gray-100">Aktivitas Pengguna Terbaru</h2>
        <ul>
            @foreach($recentActivities as $activity)
                <li class="border-b border-gray-300 dark:border-gray-700 py-2">
                    <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $activity->user->name ?? 'User' }}</span> 
                    melakukan <span class="italic text-gray-800 dark:text-gray-300">{{ $activity->action }}</span> pada 
                    <span class="text-sm text-gray-600 dark:text-gray-400">{{ $activity->created_at->format('d-m-Y H:i') }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

@section('scripts')
<!-- Sertakan Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('stockChart').getContext('2d');
    const stockChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($dates),
            datasets: [
                {
                    label: 'Transaksi Masuk',
                    data: @json($incomingData),
                    borderColor: 'rgb(34, 197, 94)', // Hijau
                    backgroundColor: 'rgba(34, 197, 94, 0.2)',
                    fill: true,
                },
                {
                    label: 'Transaksi Keluar',
                    data: @json($outgoingData),
                    borderColor: 'rgb(239, 68, 68)', // Merah
                    backgroundColor: 'rgba(239, 68, 68, 0.2)',
                    fill: true,
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        color: '#ffffff' // Warna teks pada dark mode
                    }
                },
                x: {
                    ticks: {
                        color: '#ffffff' // Warna teks pada dark mode
                    }
                }
            }
        }
    });
</script>
@endsection