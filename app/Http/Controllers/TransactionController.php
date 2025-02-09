<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock_transaction;
use App\Models\Product;

class TransactionController extends Controller
{
    public function create($type)
    {
        $name  = auth()->user()->name;
        $email = auth()->user()->email;
        
        // Validasi: pastikan $type bernilai 'in' atau 'out'
        if (!in_array($type, ['in', 'out'])) {
            abort(404, 'Tipe transaksi tidak ditemukan.');
        }
        
        // Ambil data produk untuk dropdown
        $products = Product::all();
        
        return view('admin.menu.transaction.create', compact('name', 'email', 'type', 'products'));
    }

    public function store(Request $request)
    {
        // Validasi data dari form
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|numeric|min:1',
            'notes'      => 'nullable|string',
            'type'       => 'required|in:in,out',
        ]);
    
        // Jika transaksi masuk (in)
        if ($validated['type'] === 'in') {
            // Simpan transaksi masuk dengan balance sama dengan quantity
            Stock_transaction::create([
                'product_id' => $validated['product_id'],
                'user_id'    => auth()->id(),
                'type'       => 'masuk', // gunakan 'masuk'
                'quantity'   => $validated['quantity'],
                'balance'    => $validated['quantity'],
                'date'       => now()->toDateString(),
                'status'     => 'Diterima', // sudah valid sesuai enum
                'notes'      => $validated['notes'] ?? null,
            ]);
    
            return redirect()->route('transaction.create', ['type' => 'in'])
                             ->with('success', 'Transaksi masuk berhasil disimpan.');
        }
        // Jika transaksi keluar (out) menggunakan metode FIFO
        else {
            $requiredQuantity = $validated['quantity'];
    
            // Ambil semua transaksi inbound untuk produk tersebut yang masih memiliki saldo, urutkan secara FIFO
            $inboundTransactions = Stock_transaction::where('product_id', $validated['product_id'])
                                        ->where('type', 'masuk') // mencari dengan nilai 'masuk'
                                        ->where('balance', '>', 0)
                                        ->orderBy('created_at', 'asc')
                                        ->get();
    
            // Cek apakah stok tersedia cukup
            $totalAvailable = $inboundTransactions->sum('balance');
            if ($totalAvailable < $requiredQuantity) {
                return redirect()->back()->with('error', 'Stok tidak mencukupi untuk transaksi keluar.');
            }
    
            // Proses pengurangan stok secara FIFO
            foreach ($inboundTransactions as $inbound) {
                if ($requiredQuantity <= 0) {
                    break;
                }
                // Tentukan jumlah yang dapat dikurangkan dari batch ini
                $deduct = min($inbound->balance, $requiredQuantity);
    
                // Update balance batch inbound
                $inbound->balance -= $deduct;
                $inbound->save();
    
                // Kurangi jumlah yang masih dibutuhkan
                $requiredQuantity -= $deduct;
            }
    
            // Buat record transaksi keluar dengan status yang valid
            Stock_transaction::create([
                'product_id' => $validated['product_id'],
                'user_id'    => auth()->id(),
                'type'       => 'keluar',  // gunakan 'keluar'
                'quantity'   => $validated['quantity'],
                // Tidak perlu field balance untuk transaksi keluar
                'date'       => now()->toDateString(),
                'status'     => 'Dikeluarkan', // ubah dari 'completed' ke 'Dikeluarkan'
                'notes'      => $validated['notes'] ?? null,
            ]);
    
            return redirect()->route('transaction.create', ['type' => 'out'])
                             ->with('success', 'Transaksi keluar berhasil diproses dengan metode FIFO.');
        }
    }
    
}
