<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Stock_transaction;
use App\Models\StockOpname;
use App\Models\Category;
use Carbon\Carbon;

class ReportService
{
    /**
     * Mengambil data laporan transaksi masuk berdasarkan filter.
     */
    public function getIncomingTransactions($startDate = null, $endDate = null, $categoryId = null)
    {
        $query = Stock_transaction::query()->where('type', 'masuk');

        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }
        if ($categoryId) {
            $query->whereHas('product', function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            });
        }
        return $query->with('product')->get();
    }

    /**
     * Mengambil data laporan transaksi keluar berdasarkan filter.
     */
    public function getOutgoingTransactions($startDate = null, $endDate = null, $categoryId = null)
    {
        $query = Stock_transaction::query()->where('type', 'keluar');

        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }
        if ($categoryId) {
            $query->whereHas('product', function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            });
        }
        return $query->with('product')->get();
    }

    /**
     * Mengambil data stock opname.
     */
    public function getStockOpnames()
    {
        return StockOpname::with('product')
                ->orderBy('created_at', 'desc')
                ->get();
    }

    /**
     * Mengambil daftar produk untuk laporan stok barang (jika diperlukan).
     */
    public function getStockProducts($categoryId = null)
    {
        $query = Product::query();
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }
        return $query->with('category')->get();
    }
}
