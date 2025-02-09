<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Stock_transaction;
use Carbon\Carbon;

class DashboardService
{
    /**
     * Mengembalikan ringkasan stok, misalnya total stok dan produk yang stoknya menipis.
     */
    public function getStockSummary()
{
    // Misal, total stok diambil dari kolom 'stock' di tabel products
    $totalStock = Product::sum('stock');

    // Ambil produk dengan stok menipis menggunakan nilai tetap, misalnya threshold 10
    $lowStockProducts = Product::where('stock', '<', 10)->get();
    $lowStockCount = $lowStockProducts->count();

    return [
        'totalStock'      => $totalStock,
        'lowStockCount'   => $lowStockCount,
        'lowStockProducts'=> $lowStockProducts,
    ];
}
    /**
     * Mengembalikan transaksi hari ini, misalnya jumlah barang masuk dan keluar hari ini.
     */
    public function getTransactionsToday()
    {
        $today = Carbon::now()->toDateString();

        // Ambil transaksi masuk hari ini
        $incomingToday = Stock_transaction::where('type', 'masuk')
                            ->whereDate('created_at', $today)
                            ->sum('quantity');

        // Ambil transaksi keluar hari ini
        $outgoingToday = Stock_transaction::where('type', 'keluar')
                            ->whereDate('created_at', $today)
                            ->sum('quantity');

        return [
            'incomingToday' => $incomingToday,
            'outgoingToday' => $outgoingToday,
        ];
    }
}
