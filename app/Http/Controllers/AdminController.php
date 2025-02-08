<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;
use App\Models\Product;
use App\Models\User;
use App\Models\Stock_Transaction;
use Illuminate\Support\Facades\Hash;
use App\Models\ActivityLog;
use App\Models\StockOpname;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.layout');
    }

    public function data()
    {
        $adminName = auth()->user()->name;
        $adminemail = auth()->user()->email;

        return view('admin.layout', [
            'name' => $adminName,
            'email' => $adminemail
        ]);
    }


    // menu di sidebar
    public function dashboard()
    {
        $name = auth()->user()->name;
        $email = auth()->user()->email;
        $transactions = Stock_transaction::all();
        $productCounts = [
            'Jacket' => Product::where('category_id', 1)->count(),
            'Sweater Katun' => Product::where('category_id', 2)->count(),
            'Aksesoris' => Product::where('category_id', 3)->count(),
        ];
        return view('admin.menu.dashboard', compact('name', 'email', 'transactions', 'productCounts'));
    }
    public function product()
    {
        $adminName = auth()->user()->name;
        $adminemail = auth()->user()->email;
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $categories = Category::withCount('products')->get();
        $minStock = 5; // Ganti dengan nilai batas minimum stok yang Anda inginkan
        $lowStockProducts = Product::whereHas('stockTransactions', function($query) use ($minStock) {
            $query->where('quantity', '<', $minStock);
        })->count();
        $products = Product::paginate(6);
        return view('admin.menu.product', [
            'name' => $adminName,
            'email' => $adminemail,
            'totalProducts' => $totalProducts,
            'totalCategories' => $totalCategories,
            'lowStockProducts' => $lowStockProducts,
            'products' => $products,
            'categories' =>$categories
        ]);
    }

    public function stock(Request $request)
    {
        $name = auth()->user()->name;
        $email = auth()->user()->email;
        
        // Total stok semua produk
        $totalStock = Product::sum('stock');
    
        // Hitung jumlah produk yang stoknya berada di bawah minimum_stock
        $minStock = Product::whereColumn('stock', '<', 'minimum_stock')->count();
    
        // Transaksi hari ini
        $today = Carbon::today();
        $transactionsTodayIn = Stock_transaction::where('type', 'in')
            ->whereDate('created_at', $today)
            ->sum('quantity');
        $transactionsTodayOut = Stock_transaction::where('type', 'out')
            ->whereDate('created_at', $today)
            ->sum('quantity');
        $transactionsTodayTotal = Stock_transaction::whereDate('created_at', $today)
            ->count();
    
        $transactionsToday = [
            'total' => $transactionsTodayTotal,
            'in'    => $transactionsTodayIn,
            'out'   => $transactionsTodayOut,
        ];
    
        // Riwayat transaksi (paginasi 10 per halaman)
        $transactions = Stock_transaction::with('product')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    
        // Data stock opname terbaru
        $stockOpnames = StockOpname::orderBy('date', 'desc')->get();
    
        // Produk dengan stok terendah (ambil 3 produk)
        $lowestStock = Product::orderBy('stock', 'asc')->take(3)->get();
    
        // Produk dengan stok tertinggi (ambil 10 produk)
        $highestStock = Product::orderBy('stock', 'desc')->take(10)->get();
    
        return view('admin.menu.stock', compact(
            'name',
            'email',
            'totalStock',
            'minStock',
            'transactionsToday',
            'transactions',
            'stockOpnames',
            'lowestStock',
            'highestStock'
        ));
    }
    
    public function user()
    {
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        // Ambil seluruh data pengguna, misalnya dengan pengurutan berdasarkan id
        $users = User::orderBy('id', 'asc')->get();
        return view('admin.menu.user', compact('name','email', 'users'));
    }

    /**
     * Menangani penyimpanan pengguna baru.
     */
    public function userStore(Request $request)
    {
        // Validasi input
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'role'     => 'required|string|in:Admin,Manajer Gudang,Staff Gudang',
            'password' => 'required|string|min:6',
        ]);

        // Membuat pengguna baru dengan password yang di-hash
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.menu.user')->with('success', 'Pengguna berhasil ditambahkan!');
    }
    public function report(Request $request)
{
    // Ambil data pengguna yang sedang login
    $adminName  = auth()->user()->name;
    $adminemail = auth()->user()->email;

    // Ambil filter dari query string
    $startDate  = $request->query('start_date');
    $endDate    = $request->query('end_date');
    $categoryId = $request->query('category');

    // --- Laporan Stok Barang ---
    $stockQuery = Product::query();
    if ($categoryId) {
        $stockQuery->where('category_id', $categoryId);
    }
    // Asumsikan Product memiliki relasi 'category' dan field 'sku', 'name', 'stock', dan 'unit'
    $stockProducts = $stockQuery->with('category')->get();

    // --- Laporan Transaksi ---
    $transactionQuery = Stock_transaction::query();
    if ($startDate) {
        $transactionQuery->whereDate('created_at', '>=', $startDate);
    }
    if ($endDate) {
        $transactionQuery->whereDate('created_at', '<=', $endDate);
    }
    if ($categoryId) {
        // Filter transaksi berdasarkan kategori produk yang terkait
        $transactionQuery->whereHas('product', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        });
    }
    $transactions = $transactionQuery->with('product')->get();

    // (Opsional) Data tambahan seperti daftar kategori untuk dropdown filter
    $categories = Category::all();

    // (Opsional) Data aktivitas pengguna, misalnya dengan data dummy
    $userActivities = ActivityLog::with('user')->orderBy('created_at', 'desc')->get();

    return view('admin.menu.report', [
        'name'           => $adminName,
        'email'          => $adminemail,
        'stockProducts'  => $stockProducts,
        'transactions'   => $transactions,
        'userActivities' => $userActivities,
        'categories'     => $categories,
        'filters'        => [
            'start_date' => $startDate,
            'end_date'   => $endDate,
            'category'   => $categoryId,
        ],
    ]);
}
    public function setting()
    {
        $adminName = auth()->user()->name;
        $adminemail = auth()->user()->email;
        return view('admin.menu.setting', [
            'name' => $adminName,
            'email' => $adminemail
        ]);
    }

}
