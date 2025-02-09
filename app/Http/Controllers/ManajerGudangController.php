<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock_transaction;
use App\Models\Product;
use App\Models\StockOpname;
use App\Models\Category;
use App\Models\ActivityLog;
use Carbon\Carbon;
use PDF;
use App\Services\DashboardService;
use App\Services\ReportService;

class ManajerGudangController extends Controller
{
    public function index()
    {
        return view('manajer.layout');
    }

    public function data()
    {
        $manajerName = auth()->user()->name;
        $manajeremail = auth()->user()->email;

        return view('manajer.layout', [
            'name' => $manajerName,
            'email' => $manajeremail
        ]);
    }
    public function dashboard(Request $request, DashboardService $dashboardService)
    {
        $name = auth()->user()->name;
        $email = auth()->user()->email;

        // Dapatkan data ringkasan stok dan transaksi dari service
        $stockSummary = $dashboardService->getStockSummary();
        $transactionsToday = $dashboardService->getTransactionsToday();

        return view('manajer.menu.dashboard', [
            'name'              => $name,
            'email'             => $email,
            'totalStock'        => $stockSummary['totalStock'],
            'lowStockCount'     => $stockSummary['lowStockCount'],
            'lowStockProducts'  => $stockSummary['lowStockProducts'],
            'transactionsToday' => $transactionsToday,
        ]);
    }
    public function product()
{
    $manajerName = auth()->user()->name;
    $manajerEmail = auth()->user()->email;
    // Ambil semua produk, misalnya menggunakan model Product
    $products = \App\Models\Product::all();

    return view('manajer.menu.product', [
        'name'     => $manajerName,
        'email'    => $manajerEmail,
        'products' => $products,
    ]);
}

    public function stock()
    {
        $manajerName = auth()->user()->name;
        $manajeremail = auth()->user()->email;
        return view('manajer.menu.stock', [
            'name' => $manajerName,
            'email' => $manajeremail
        ]);
    }
    public function supplier()
    {
        $manajerName = auth()->user()->name;
        $manajeremail = auth()->user()->email;
        return view('manajer.menu.supplier', [
            'name' => $manajerName,
            'email' => $manajeremail
        ]);
    }

    //menu Report
    protected $reportService;
    protected $manajerName;
    protected $manajeremail;

    public function __construct(ReportService $reportService)
    {
        // Gunakan middleware closure agar auth user sudah tersedia
        $this->middleware(function ($request, $next) {
            $this->manajerName  = auth()->user()->name;
            $this->manajeremail = auth()->user()->email;
            return $next($request);
        });
        
        $this->reportService = $reportService;
    }

    // Method report() yang menampilkan laporan di web (sebagai referensi)
    public function report(Request $request)
    {
        $startDate  = $request->query('start_date');
        $endDate    = $request->query('end_date');
        $categoryId = $request->query('category');

        $incomingTransactions = $this->reportService->getIncomingTransactions($startDate, $endDate, $categoryId);
        $outgoingTransactions = $this->reportService->getOutgoingTransactions($startDate, $endDate, $categoryId);
        $stockOpnames         = $this->reportService->getStockOpnames();
        $categories           = Category::all();

        return view('manajer.menu.report', [
            'name'                => $this->manajerName,
            'email'               => $this->manajeremail,
            'incomingTransactions'=> $incomingTransactions,
            'outgoingTransactions'=> $outgoingTransactions,
            'stockOpnames'        => $stockOpnames,
            'categories'          => $categories,
            'filters'             => [
                'start_date' => $startDate,
                'end_date'   => $endDate,
                'category'   => $categoryId,
            ],
            'userActivities'      => ActivityLog::with('user')->orderBy('created_at', 'desc')->get(),
        ]);
    }

    // Method baru untuk cetak PDF
    public function printPdf(Request $request)
    {
        $startDate  = $request->query('start_date');
        $endDate    = $request->query('end_date');
        $categoryId = $request->query('category');

        // Ambil data laporan menggunakan ReportService
        $incomingTransactions = $this->reportService->getIncomingTransactions($startDate, $endDate, $categoryId);
        $outgoingTransactions = $this->reportService->getOutgoingTransactions($startDate, $endDate, $categoryId);
        $stockOpnames         = $this->reportService->getStockOpnames();
        $categories           = Category::all();
        
        // Siapkan data yang akan dikirim ke view PDF
        $data = [
            'name'                => $this->manajerName,
            'email'               => $this->manajeremail,
            'incomingTransactions'=> $incomingTransactions,
            'outgoingTransactions'=> $outgoingTransactions,
            'stockOpnames'        => $stockOpnames,
            'categories'          => $categories,
            'filters'             => [
                'start_date' => $startDate,
                'end_date'   => $endDate,
                'category'   => $categoryId,
            ],
        ];

        // Muat view PDF dan generate file PDF
        $pdf = PDF::loadView('manajer.menu.report_pdf', $data);
        return $pdf->download('laporan-manajer.pdf');
    }

    public function setting()
    {
        $manajerName = auth()->user()->name;
        $manajeremail = auth()->user()->email;
        return view('manajer.menu.setting', [
            'name' => $manajerName,
            'email' => $manajeremail
        ]);
    }
}
